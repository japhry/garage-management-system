/* Shared relational data foundation for demo mode */
(function () {
  const STORAGE_KEY = 'garage_demo_relational_data_v1';

  const defaultData = {
    customers: [
      { id: 'C-001', name: 'John Doe', phone: '+255700000001' },
      { id: 'C-002', name: 'Sarah Johnson', phone: '+255700000002' },
      { id: 'C-003', name: 'Mike Wilson', phone: '+255700000003' },
      { id: 'C-004', name: 'Emma Davis', phone: '+255700000004' }
    ],
    vehicles: [
      { id: 'V-001', registration: 'T789GHI', makeModel: 'Toyota Corolla', customerId: 'C-001' },
      { id: 'V-002', registration: 'T456DEF', makeModel: 'Honda CR-V', customerId: 'C-002' },
      { id: 'V-003', registration: 'T123ABC', makeModel: 'Nissan X-Trail', customerId: 'C-003' },
      { id: 'V-004', registration: 'T999XYZ', makeModel: 'Ford Focus', customerId: 'C-004' }
    ],
    documents: [
      { id: 'D-ES-1003', type: 'estimate', number: 1003, date: '2025-07-07', vehicleId: 'V-001', total: 0, status: 'Auth Req' },
      { id: 'D-ES-1002', type: 'estimate', number: 1002, date: '2025-07-07', vehicleId: 'V-002', total: 0, status: 'Service' },
      { id: 'D-ES-1001', type: 'estimate', number: 1001, date: '2025-07-04', vehicleId: 'V-003', total: 0, status: 'Complete' },
      { id: 'D-ES-1000', type: 'estimate', number: 1000, date: '2025-07-03', vehicleId: 'V-004', total: 0, status: 'Urgent' },

      { id: 'D-JS-1003', type: 'job-sheet', number: 1003, date: '2025-07-04', vehicleId: 'V-001', total: 0, status: 'Open' },
      { id: 'D-JS-1002', type: 'job-sheet', number: 1002, date: '2025-07-04', vehicleId: 'V-002', total: 0, status: 'In Progress' },
      { id: 'D-JS-1001', type: 'job-sheet', number: 1001, date: '2025-07-04', vehicleId: 'V-003', total: 50, status: 'Completed' },
      { id: 'D-JS-1000', type: 'job-sheet', number: 1000, date: '2025-07-03', vehicleId: 'V-004', total: 0, status: 'On Hold' },

      { id: 'D-INV-2001', type: 'invoice', number: 2001, date: '2025-07-05', vehicleId: 'V-001', total: 150000, status: 'Open' },
      { id: 'D-INV-2000', type: 'invoice', number: 2000, date: '2025-07-04', vehicleId: 'V-002', total: 75000, status: 'Completed' }
    ]
  };

  function parseJson(raw, fallback) {
    try {
      return JSON.parse(raw);
    } catch (error) {
      return fallback;
    }
  }

  function loadData() {
    const raw = localStorage.getItem(STORAGE_KEY);
    if (!raw) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultData));
      return defaultData;
    }
    return parseJson(raw, defaultData);
  }

  function saveData(data) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
  }

  function formatDate(iso) {
    const date = new Date(iso + 'T00:00:00');
    return date.toLocaleDateString('en-GB');
  }

  function formatMoney(amount) {
    return Number(amount || 0).toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
  }

  function getVehicleById(data, vehicleId) {
    return data.vehicles.find((v) => v.id === vehicleId) || null;
  }

  function getCustomerById(data, customerId) {
    return data.customers.find((c) => c.id === customerId) || null;
  }

  function getNextId(prefix, list) {
    const max = list.reduce((acc, item) => {
      const part = String(item.id || '').replace(prefix + '-', '');
      const num = parseInt(part, 10);
      return Number.isFinite(num) ? Math.max(acc, num) : acc;
    }, 0);
    return `${prefix}-${String(max + 1).padStart(3, '0')}`;
  }

  function getCustomerByName(data, name) {
    const target = String(name || '').trim().toLowerCase();
    if (!target) return null;
    return data.customers.find((c) => String(c.name || '').trim().toLowerCase() === target) || null;
  }

  function getLatestInvoiceDateForVehicle(data, vehicleId) {
    const invoices = data.documents
      .filter((d) => d.type === 'invoice' && d.vehicleId === vehicleId)
      .sort((a, b) => new Date(b.date) - new Date(a.date));
    return invoices.length ? invoices[0].date : null;
  }

  function getLatestInvoiceDateForCustomer(data, customerId) {
    const vehicleIds = data.vehicles.filter((v) => v.customerId === customerId).map((v) => v.id);
    const invoices = data.documents
      .filter((d) => d.type === 'invoice' && vehicleIds.includes(d.vehicleId))
      .sort((a, b) => new Date(b.date) - new Date(a.date));
    return invoices.length ? invoices[0].date : null;
  }

  function getCustomerSummaries() {
    const data = loadData();
    return data.customers.map((customer) => {
      const vehicleIds = data.vehicles.filter((v) => v.customerId === customer.id).map((v) => v.id);
      const docsCount = data.documents.filter((d) => vehicleIds.includes(d.vehicleId)).length;
      return {
        ...customer,
        totalVehicles: vehicleIds.length,
        totalDocs: docsCount,
        lastInvoiceDate: getLatestInvoiceDateForCustomer(data, customer.id)
      };
    });
  }

  function getVehicleSummaries() {
    const data = loadData();
    return data.vehicles.map((vehicle) => {
      const customer = getCustomerById(data, vehicle.customerId);
      const docsCount = data.documents.filter((d) => d.vehicleId === vehicle.id).length;
      return {
        ...vehicle,
        customerName: customer ? customer.name : '',
        totalDocs: docsCount,
        lastInvoiceDate: getLatestInvoiceDateForVehicle(data, vehicle.id)
      };
    });
  }

  function getDocumentsByType(type) {
    const data = loadData();
    return data.documents
      .filter((d) => d.type === type)
      .sort((a, b) => b.number - a.number)
      .map((doc) => {
        const vehicle = getVehicleById(data, doc.vehicleId);
        const customer = vehicle ? getCustomerById(data, vehicle.customerId) : null;
        return {
          ...doc,
          registration: vehicle ? vehicle.registration : '',
          makeModel: vehicle ? vehicle.makeModel : '',
          customerName: customer ? customer.name : ''
        };
      });
  }

  function renderDocumentRows(type, tbodySelector, config) {
    const tbody = document.querySelector(tbodySelector);
    if (!tbody) return 0;

    const rows = getDocumentsByType(type);
    const statuses = config.statuses || [];
    const badgeClass = config.badgeClass || '';
    const badgeLabel = config.badgeLabel || '';
    const withActions = Boolean(config.withActions);

    tbody.innerHTML = rows.map((row) => {
      const statusOptions = statuses.map((s) => {
        const selected = s === row.status ? ' selected' : '';
        return `<option${selected}>${s}</option>`;
      }).join('');

      const actionCol = withActions
        ? `<td style="display:flex;gap:6px;align-items:center;">
            <button class="table-action-btn secondary"><i class="fas fa-phone"></i></button>
            <button class="action-btn" style="padding:4px 16px;font-size:0.95em;">Open</button>
          </td>`
        : '';

      return `<tr>
        <td><span class="doc-type-badge ${badgeClass}">${badgeLabel}</span></td>
        <td>${row.number}</td>
        <td>${formatDate(row.date)}</td>
        <td>${row.registration}</td>
        <td>${row.makeModel}</td>
        <td>${row.customerName}</td>
        <td>${formatMoney(row.total)}</td>
        <td>
          <select class="table-select">${statusOptions}</select>
        </td>
        ${actionCol}
      </tr>`;
    }).join('');

    return rows.length;
  }

  function renderCustomerRows(tbodySelector, options) {
    const tbody = document.querySelector(tbodySelector);
    if (!tbody) return 0;

    const query = String((options && options.query) || '').trim().toLowerCase();
    const limit = Number((options && options.limit) || 500);
    const rows = getCustomerSummaries()
      .filter((row) => {
        if (!query) return true;
        const text = `${row.id} ${row.name} ${row.address || ''} ${row.postcode || ''}`.toLowerCase();
        return text.includes(query);
      })
      .slice(0, limit);

    tbody.innerHTML = rows.map((row) => {
      const lastInv = row.lastInvoiceDate ? new Date(row.lastInvoiceDate + 'T00:00:00').toLocaleDateString('en-GB') : '-';
      return `<tr>
        <td style="padding: 16px 18px;"><span class="acc-badge">ACC-${String(row.id).replace('C-', '')}</span></td>
        <td style="padding: 16px 18px;">${row.name || ''}</td>
        <td style="padding: 16px 18px;">${row.address || '-'}</td>
        <td style="padding: 16px 18px;">${row.postcode || '-'}</td>
        <td style="padding: 16px 18px;">${row.totalVehicles}</td>
        <td style="padding: 16px 18px;">${row.totalDocs}</td>
        <td style="padding: 16px 18px;">${lastInv}</td>
      </tr>`;
    }).join('');

    return rows.length;
  }

  function renderVehicleRows(tbodySelector, options) {
    const tbody = document.querySelector(tbodySelector);
    if (!tbody) return 0;

    const query = String((options && options.query) || '').trim().toLowerCase();
    const limit = Number((options && options.limit) || 500);
    const rows = getVehicleSummaries()
      .filter((row) => {
        if (!query) return true;
        const text = `${row.registration} ${row.makeModel} ${row.customerName}`.toLowerCase();
        return text.includes(query);
      })
      .slice(0, limit);

    tbody.innerHTML = rows.map((row) => {
      const lastInv = row.lastInvoiceDate ? new Date(row.lastInvoiceDate + 'T00:00:00').toLocaleDateString('en-GB') : '-';
      return `<tr>
        <td style="padding: 16px 18px;"><span class="reg-badge">${row.registration || ''}</span></td>
        <td style="padding: 16px 18px;">${row.makeModel || ''}</td>
        <td style="padding: 16px 18px;">${row.customerName || '-'}</td>
        <td style="padding: 16px 18px;">-</td>
        <td style="padding: 16px 18px;">${row.totalDocs}</td>
        <td style="padding: 16px 18px;">${lastInv}</td>
      </tr>`;
    }).join('');

    return rows.length;
  }

  function addCustomer(payload) {
    const data = loadData();
    const newCustomer = {
      id: getNextId('C', data.customers),
      name: String(payload.name || '').trim(),
      phone: String(payload.phone || '').trim(),
      email: String(payload.email || '').trim(),
      company: String(payload.company || '').trim(),
      address: String(payload.address || '').trim(),
      postcode: String(payload.postcode || '').trim()
    };
    data.customers.push(newCustomer);
    saveData(data);
    return newCustomer;
  }

  function addVehicle(payload) {
    const data = loadData();
    let customerId = String(payload.customerId || '').trim();
    if (!customerId && payload.customerName) {
      const existingCustomer = getCustomerByName(data, payload.customerName);
      if (existingCustomer) {
        customerId = existingCustomer.id;
      } else {
        const createdCustomer = {
          id: getNextId('C', data.customers),
          name: String(payload.customerName || '').trim(),
          phone: '',
          email: '',
          company: '',
          address: '',
          postcode: ''
        };
        data.customers.push(createdCustomer);
        customerId = createdCustomer.id;
      }
    }
    if (!customerId && data.customers.length) {
      customerId = data.customers[0].id;
    }

    const make = String(payload.make || '').trim();
    const model = String(payload.model || '').trim();
    const newVehicle = {
      id: getNextId('V', data.vehicles),
      registration: String(payload.registration || '').trim(),
      makeModel: `${make} ${model}`.trim(),
      customerId
    };
    data.vehicles.push(newVehicle);
    saveData(data);
    return newVehicle;
  }

  window.GarageDataLayer = {
    loadData,
    saveData,
    addCustomer,
    addVehicle,
    getCustomerSummaries,
    getVehicleSummaries,
    getDocumentsByType,
    renderDocumentRows,
    renderCustomerRows,
    renderVehicleRows
  };
})();
