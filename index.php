<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compound V Drugstore · Pharmacy Management</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary: #1e3c72;
            --primary-light: #2a5298;
            --primary-dark: #0f2440;
            --success: #27ae60;
            --danger: #e74c3c;
            --warning: #f39c12;
            --info: #3498db;
            --gray: #95a5a6;
            --light-bg: #f0f4f8;
            --shadow: 0 2px 10px rgba(0,0,0,0.1);
            --radius: 12px;
        }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: var(--light-bg); color: #333; }

        /* === LOGIN === */
        #loginPage { min-height: 100vh; display: flex; justify-content: center; align-items: center; background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); padding: 20px; }
        .login-container { background: white; border-radius: 20px; padding: 40px; max-width: 420px; width: 100%; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: slideUp 0.5s ease; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .login-container .logo { text-align: center; margin-bottom: 30px; }
        .login-container .logo h1 { font-size: 32px; font-weight: 300; color: var(--primary); }
        .login-container .logo h1 span { font-weight: 700; color: var(--primary-light); }
        .login-container .logo p { color: #888; font-size: 14px; margin-top: 5px; }
        .login-container .form-group { margin-bottom: 20px; position: relative; }
        .login-container label { display: block; font-weight: 600; font-size: 14px; color: #555; margin-bottom: 5px; }
        .login-container input { width: 100%; padding: 12px 16px; border: 2px solid #e0e7ef; border-radius: 10px; font-size: 15px; transition: all 0.3s; padding-right: 45px; }
        .login-container input:focus { outline: none; border-color: var(--primary-light); box-shadow: 0 0 0 3px rgba(42,82,152,0.1); }
        .login-container .password-toggle { position: absolute; right: 14px; top: 40px; background: none; border: none; cursor: pointer; font-size: 20px; color: #888; }
        .login-container .password-toggle:hover { color: var(--primary); }
        .login-container .btn-login { width: 100%; padding: 14px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; border: none; border-radius: 10px; font-size: 16px; font-weight: 700; cursor: pointer; transition: all 0.3s; margin-top: 10px; }
        .login-container .btn-login:hover { transform: translateY(-2px); box-shadow: 0 4px 20px rgba(42,82,152,0.4); }
        .login-container .register-link { text-align: center; margin-top: 20px; font-size: 14px; color: #666; }
        .login-container .register-link a { color: var(--primary-light); text-decoration: none; font-weight: 600; cursor: pointer; }

        /* === MAIN APP === */
        #mainApp { display: none; width: 100%; min-height: 100vh; }

        /* === HEADER === */
        .header { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; padding: 12px 30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.3); position: sticky; top: 0; z-index: 100; flex-wrap: wrap; gap: 10px; }
        .header h1 { font-size: 24px; font-weight: 300; }
        .header h1 span { font-weight: 700; color: #64b5f6; }
        .header .user-info { display: flex; align-items: center; gap: 15px; font-size: 14px; flex-wrap: wrap; }
        .header .user-info > div { display: flex; flex-direction: column; gap: 6px; }
        .header .user-info .session-meta { display: flex; flex-direction: column; gap: 4px; font-size: 11px; opacity: 0.85; }
        .header .user-info .role-badge { font-size: 12px; opacity: 0.8; background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 10px; }
        .header .user-info .avatar { width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .logout-btn { background: rgba(255,255,255,0.15); border: none; color: white; padding: 6px 16px; border-radius: 20px; cursor: pointer; font-size: 13px; transition: all 0.3s; }
        .logout-btn:hover { background: rgba(255,255,255,0.3); }

        /* === MAIN NAVIGATION BUTTONS === */
        .main-nav {
            background: white;
            padding: 12px 30px;
            display: flex;
            gap: 10px;
            border-bottom: 2px solid #e8edf3;
            position: sticky;
            top: 68px;
            z-index: 99;
            overflow-x: auto;
            overflow-y: visible;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: center;
        }
        .main-nav .nav-btn {
            padding: 12px 28px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .main-nav .nav-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .main-nav .nav-btn:active { transform: translateY(0); }
        .main-nav .nav-btn.primary-btn { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); }
        .main-nav .nav-btn.primary-btn:hover { background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); }
        .main-nav .nav-btn.primary-btn.active { background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); box-shadow: 0 0 0 3px rgba(30,60,114,0.3); }
        .main-nav .nav-btn.success-btn { background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%); }
        .main-nav .nav-btn.success-btn:hover { background: linear-gradient(135deg, #219a52 0%, #27ae60 100%); }
        .main-nav .nav-btn.success-btn.active { background: linear-gradient(135deg, #1e8449 0%, #27ae60 100%); box-shadow: 0 0 0 3px rgba(39,174,96,0.3); }
        .main-nav .nav-btn.warning-btn { background: linear-gradient(135deg, #f39c12 0%, #f1c40f 100%); }
        .main-nav .nav-btn.warning-btn:hover { background: linear-gradient(135deg, #e67e22 0%, #f39c12 100%); }
        .main-nav .nav-btn.warning-btn.active { background: linear-gradient(135deg, #d68910 0%, #f39c12 100%); box-shadow: 0 0 0 3px rgba(243,156,18,0.3); }
        .main-nav .nav-btn.info-btn { background: linear-gradient(135deg, #3498db 0%, #5dade2 100%); }
        .main-nav .nav-btn.info-btn:hover { background: linear-gradient(135deg, #2980b9 0%, #3498db 100%); }
        .main-nav .nav-btn.info-btn.active { background: linear-gradient(135deg, #1f618d 0%, #3498db 100%); box-shadow: 0 0 0 3px rgba(52,152,219,0.3); }
        .main-nav .nav-btn.danger-btn { background: linear-gradient(135deg, #e74c3c 0%, #ec7063 100%); }
        .main-nav .nav-btn.danger-btn:hover { background: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%); }
        .main-nav .nav-btn.danger-btn.active { background: linear-gradient(135deg, #922b21 0%, #e74c3c 100%); box-shadow: 0 0 0 3px rgba(231,76,60,0.3); }
        .main-nav .nav-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none !important; }
        .main-nav .nav-btn .badge { background: rgba(255,255,255,0.3); padding: 2px 10px; border-radius: 12px; font-size: 11px; }
        .main-nav .nav-divider { width: 2px; height: 30px; background: #e8edf3; border-radius: 2px; }
        .nav-dropdown { position: relative; z-index: 99999; }
        .nav-dropdown-toggle { display: flex; align-items: center; justify-content: center; padding: 8px 18px; font-size: 13px; }
        .nav-dropdown .dropdown-arrow { margin-left: 6px; font-size: 11px; }
        .dropdown-menu {
            display: none;
            position: fixed;
            top: calc(68px + 44px + 8px);
            left: 125px;
            min-width: 220px;
            background: white;
            border: 1px solid #e0e7ef;
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
            border-radius: 14px;
            z-index: 999999;
            overflow: visible;
            padding: 6px;
        }
        .nav-dropdown.open .dropdown-menu { display: block; }
        .dropdown-item {
            width: 100%;
            padding: 8px 14px;
            background: white;
            border: 1px solid #e6eef8;
            border-radius: 8px;
            text-align: left;
            font-size: 13px;
            color: #222;
            cursor: pointer;
            transition: background 0.15s, transform 0.15s;
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
            margin: 6px 0;
        }
        .dropdown-item:hover {
            background: #f4f8ff;
            transform: translateY(-1px);
        }
        .dropdown-item-icon { width: 18px; height: 18px; display: inline-flex; align-items: center; justify-content: center; flex: 0 0 18px; }
        .dropdown-item-text { display: inline-block; }

        /* === SECONDARY NAV === */
        .secondary-nav {
            background: #f8fafc;
            padding: 0 30px;
            display: flex;
            gap: 3px;
            border-bottom: 1px solid #e8edf3;
            position: sticky;
            top: 132px;
            z-index: 98;
            overflow-x: auto;
            flex-wrap: nowrap;
        }
        .secondary-nav button {
            padding: 10px 18px;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            white-space: nowrap;
        }
        .secondary-nav button:hover { color: var(--primary); background: rgba(30,60,114,0.05); }
        .secondary-nav button.active { color: var(--primary); border-bottom-color: var(--primary); }
        .secondary-nav button:disabled { opacity: 0.4; cursor: not-allowed; }
        .secondary-nav .badge-notification { background: var(--danger); color: white; border-radius: 50%; padding: 1px 7px; font-size: 10px; margin-left: 5px; display: inline-block; }

        /* === CONTAINER & TABS === */
        .container { padding: 20px; max-width: 1600px; margin: 0 auto; }
        .tab-content { display: none; animation: fadeIn 0.4s ease; }
        .tab-content.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* === DASHBOARD === */
        .dashboard-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: 15px; margin-bottom: 25px; }
        .stat-card { background: white; padding: 18px; border-radius: var(--radius); box-shadow: var(--shadow); transition: transform 0.3s; cursor: default; }
        .stat-card:hover { transform: translateY(-3px); }
        .stat-card .stat-number { font-size: 24px; font-weight: 700; color: var(--primary); }
        .stat-card .stat-label { font-size: 13px; color: #666; }
        .stat-card.clickable { cursor: pointer; }
        .stat-card.clickable:hover { border: 2px solid var(--primary-light); }

        .dashboard-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
        .dashboard-card { background: white; border-radius: var(--radius); padding: 20px; box-shadow: var(--shadow); }
        .dashboard-card h3 { margin-bottom: 15px; color: var(--primary); font-size: 16px; }
        .recent-activity, .low-stock-list { max-height: 300px; overflow-y: auto; }
        .activity-item { padding: 10px 0; border-bottom: 1px solid #f0f4f8; display: flex; justify-content: space-between; font-size: 14px; }
        .activity-item .time { color: #999; font-size: 12px; }
        .low-stock-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f0f4f8; align-items: center; }
        .stock-badge { padding: 2px 12px; border-radius: 12px; font-size: 12px; font-weight: 600; }
        .stock-badge.critical { background: #f8d7da; color: #721c24; }
        .stock-badge.low { background: #fff3cd; color: #856404; }
        .expiry-alert-banner { background: #fff3cd; padding: 12px 18px; border-radius: 8px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; border-left: 4px solid var(--warning); }
        .expiry-alert-banner.danger { background: #f8d7da; border-left-color: var(--danger); }
        .expiry-alert-banner .alert-text { font-weight: 600; }
        .expiry-alert-banner .alert-count { background: rgba(0,0,0,0.1); padding: 2px 12px; border-radius: 12px; font-size: 13px; font-weight: 600; }
        .expiry-indicator { display: inline-block; width: 10px; height: 10px; border-radius: 50%; margin-right: 8px; }
        .expiry-indicator.expired { background: var(--danger); }
        .expiry-indicator.soon { background: var(--warning); }
        .expiry-indicator.good { background: var(--success); }

        /* === POS === */
        .pos-layout { display: grid; grid-template-columns: 1fr 380px; gap: 20px; height: calc(100vh - 280px); }
        .pos-left { display: flex; flex-direction: column; gap: 20px; }
        .search-section { background: white; padding: 20px; border-radius: var(--radius); box-shadow: var(--shadow); }
        .search-bar { display: flex; gap: 10px; margin-bottom: 15px; flex-wrap: wrap; }
        .search-bar input { flex: 1; padding: 12px 18px; border: 2px solid #e0e7ef; border-radius: 8px; font-size: 15px; min-width: 150px; }
        .search-bar input:focus { outline: none; border-color: var(--primary-light); box-shadow: 0 0 0 3px rgba(42,82,152,0.1); }
        .search-bar select { padding: 12px 18px; border: 2px solid #e0e7ef; border-radius: 8px; font-size: 15px; background: white; }

        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 12px; max-height: 400px; overflow-y: auto; padding: 5px; }
        .product-card { background: #f8fafc; border: 2px solid #e8edf3; border-radius: 10px; padding: 14px; text-align: center; cursor: pointer; transition: all 0.25s; position: relative; display: flex; flex-direction: column; justify-content: space-between; }
        .product-card:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,0.08); border-color: var(--primary-light); }
        .product-card .name { font-weight: 600; font-size: 13px; margin-bottom: 4px; }
        .product-card .price { color: var(--primary-light); font-weight: 700; font-size: 15px; margin-bottom: 8px; }
        .product-card .stock { font-size: 12px; color: #666; margin-bottom: 10px; }
        .product-card .stock.low { color: var(--danger); }
        .product-card .expiry-badge { position: absolute; top: 4px; left: 4px; font-size: 8px; padding: 2px 6px; border-radius: 8px; font-weight: 700; }
        .expiry-badge.expired { background: var(--danger); color: white; }
        .expiry-badge.expiring { background: var(--warning); color: white; }
        .expiry-badge.good { background: var(--success); color: white; }
        .product-card .category-badge { position: absolute; top: 4px; right: 4px; background: var(--primary-light); color: white; font-size: 8px; padding: 2px 8px; border-radius: 12px; opacity: 0.8; }
        .product-card .add-to-cart-btn { margin-top: 10px; padding: 10px 12px; border: none; border-radius: 8px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; font-weight: 700; cursor: pointer; transition: all 0.25s; width: 100%; }
        .product-card .add-to-cart-btn:hover { background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); }

        .pos-right { background: white; border-radius: var(--radius); box-shadow: var(--shadow); display: flex; flex-direction: column; height: 100%; min-height: 0; --cart-grid: 1fr 80px 100px 56px; }
        .cart-header { padding: 16px 20px; border-bottom: 2px solid #f0f4f8; display: flex; justify-content: space-between; align-items: center; }
        .cart-header h2 { font-size: 18px; font-weight: 600; }
        .cart-items { flex: 1; overflow-y: auto; padding: 10px 0; min-height: 0; }
        .cart-table-header { display: grid; grid-template-columns: var(--cart-grid); gap: 8px; padding: 12px 16px; font-weight: 700; color: #555; background: #f7fafc; border-bottom: 1px solid #e8edf3; align-items: center; box-sizing: border-box; }
        .cart-table-header > div:nth-child(1) { justify-self: start; }
        .cart-table-header > div:nth-child(2) { justify-self: center; text-align: center; }
        .cart-table-header > div:nth-child(3) { justify-self: end; text-align: right; }
        .cart-table-header > div:nth-child(4) { justify-self: center; text-align: center; }
        .cart-item { display: grid; grid-template-columns: var(--cart-grid); align-items: center; gap: 8px; padding: 10px 16px; border-bottom: 1px solid #f0f4f8; animation: slideIn 0.3s ease; box-sizing: border-box; }
        .cart-item > .item-info { justify-self: start; }
        .cart-item > .item-qty { justify-self: center; }
        .cart-item > .item-total { justify-self: end; }
        .cart-item > .remove-btn { justify-self: center; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        .cart-item.expired { background: #fff1f0; }
        .cart-item .item-info { display: flex; flex-direction: column; gap: 4px; min-width: 0; overflow: hidden; }
        .cart-table-header > div, .cart-item > * { box-sizing: border-box; }
        .cart-table-header > div { padding: 0 6px; }
        .cart-item > * { padding: 0 6px; }
        .cart-item .item-name { font-weight: 600; font-size: 13px; }
        .cart-item .item-meta { font-size: 11px; color: #888; }
        .cart-item .item-qty { display: flex; justify-content: center; }
        .cart-item .item-qty input { width: 60px; min-width: 60px; max-width: 70px; padding: 8px 10px; border: 2px solid #e0e7ef; border-radius: 8px; text-align: center; color: #333; }
        .cart-item .item-total { font-weight: 700; color: var(--primary-light); font-size: 14px; display:flex; justify-content:flex-end; align-items:center; padding-right: 6px; box-sizing: border-box; font-family: 'Courier New', Courier, monospace; }
        .cart-item .remove-btn { width: 36px; height: 36px; border: none; border-radius: 50%; background: #fdecea; color: var(--danger); cursor: pointer; font-size: 16px; transition: all 0.2s; }
        .cart-item .remove-btn:hover { background: #f8d7da; }

        .senior-discount-row label { font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; }
        .senior-id-row { display: flex; flex-direction: column; gap: 6px; margin-top: 8px; }
        .senior-id-row.hidden { display: none; }
        .senior-id-row label { font-size: 13px; color: #444; }
        .senior-id-input { display: flex; align-items: center; gap: 6px; }
        .senior-id-input span { background: #eef6ff; padding: 10px 12px; border: 2px solid #d6e9ff; border-radius: 10px 0 0 10px; color: #1484d8; font-weight: 700; }
        .senior-id-input input { flex: 1; padding: 10px 12px; border: 2px solid #e0e7ef; border-radius: 0 10px 10px 0; outline: none; }
        .senior-discount-status { color: #0f9d58; font-size: 13px; font-weight: 700; margin-top: 6px; }

        .cart-footer { padding: 16px 20px; border-top: 2px solid #f0f4f8; background: #fafbfc; border-radius: 0 0 var(--radius) var(--radius); }
        .cart-selection { display: flex; flex-direction: column; gap: 8px; margin: 16px 0 0; }
        .cart-selection label { font-size: 13px; font-weight: 600; color: #444; }
        .cart-selection select { width: 100%; padding: 12px 14px; border: 2px solid #e0e7ef; border-radius: 10px; background: white; color: #333; appearance: none; }
        .cart-summary { display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px; }
        .cart-summary.total { font-size: 20px; font-weight: 700; color: var(--primary); border-top: 2px solid #e0e7ef; padding-top: 10px; margin-top: 6px; }
        .cart-actions { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px; margin-top: 12px; }
        .cart-actions button { padding: 10px; border: none; border-radius: 8px; font-weight: 600; font-size: 13px; cursor: pointer; transition: all 0.3s; }
        .btn-checkout { background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%); color: white; grid-column: 1 / -1; }
        .btn-checkout:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(46,204,113,0.4); }
        .btn-clear { background: var(--danger); color: white; }
        .btn-clear:hover { background: #c0392b; }
        .btn-discount { background: var(--warning); color: white; }
        .btn-discount:hover { background: #e67e22; }
        .btn-load-cart, .btn-hold { background: var(--info); color: white; }
        .btn-load-cart:hover, .btn-hold:hover { background: #2980b9; }
        .empty-cart { text-align: center; color: #999; padding: 40px 20px; font-size: 15px; }
        .empty-cart .icon { font-size: 44px; margin-bottom: 10px; opacity: 0.5; }

        /* === MANAGEMENT TABLES === */
        .management-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
        .management-header .btn { padding: 10px 24px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; }
        .btn-primary { background: var(--primary-light); color: white; }
        .btn-primary:hover { background: var(--primary); transform: translateY(-2px); }
        .btn-success { background: var(--success); color: white; }
        .btn-success:hover { background: #219a52; }
        .btn-danger { background: var(--danger); color: white; }
        .btn-danger:hover { background: #c0392b; }
        .btn-warning { background: var(--warning); color: white; }
        .btn-warning:hover { background: #e67e22; }
        .btn-info { background: var(--info); color: white; }
        .btn-info:hover { background: #2980b9; }

        .table-container { background: white; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow); overflow-x: auto; }
        .table-container table { width: 100%; border-collapse: collapse; min-width: 700px; }
        .table-container th { background: #f8fafc; padding: 14px 16px; text-align: left; font-weight: 600; font-size: 13px; color: #555; border-bottom: 2px solid #e8edf3; white-space: nowrap; }
        .table-container td { padding: 12px 16px; border-bottom: 1px solid #f0f4f8; font-size: 14px; }
        .table-container tr:hover { background: #fafbfc; }

        .status-badge { padding: 3px 12px; border-radius: 12px; font-size: 12px; font-weight: 600; display: inline-block; }
        .status-badge.active { background: #d4edda; color: #155724; }
        .status-badge.pending { background: #fff3cd; color: #856404; }
        .status-badge.approved { background: #d4edda; color: #155724; }
        .status-badge.rejected { background: #f8d7da; color: #721c24; }
        .status-badge.expired { background: #f8d7da; color: #721c24; }
        .status-badge.expiring { background: #fff3cd; color: #856404; }

        .table-actions { display: flex; gap: 6px; flex-wrap: wrap; }
        .table-actions button { padding: 4px 10px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.2s; }
        .table-actions .edit-btn { background: #d4edda; color: #155724; }
        .table-actions .edit-btn:hover { background: #b8dcc4; }
        .table-actions .archive-btn { background: #fff3cd; color: #856404; }
        .table-actions .archive-btn:hover { background: #f5e6b8; }
        .table-actions .approve-btn { background: #d4edda; color: #155724; }
        .table-actions .approve-btn:hover { background: #b8dcc4; }
        .table-actions .reject-btn { background: #f8d7da; color: #721c24; }
        .table-actions .reject-btn:hover { background: #f1c0c3; }

        /* === MODAL === */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000; }
        .modal.active { display: flex; }
        .modal-content { background: white; padding: 30px; border-radius: 16px; max-width: 550px; width: 92%; max-height: 85vh; overflow-y: auto; box-shadow: 0 20px 60px rgba(0,0,0,0.3); animation: modalIn 0.3s ease; }
        @keyframes modalIn { from { opacity: 0; transform: scale(0.9) translateY(20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
        .modal-content h2 { margin-bottom: 20px; color: var(--primary); }
        .modal-content .form-group { margin-bottom: 16px; }
        .modal-content label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 4px; color: #555; }
        .modal-content input, .modal-content select, .modal-content textarea { width: 100%; padding: 10px 14px; border: 2px solid #e0e7ef; border-radius: 8px; font-size: 14px; transition: all 0.3s; font-family: inherit; }
        .modal-content textarea { resize: vertical; min-height: 80px; }
        .modal-content input:focus, .modal-content select:focus, .modal-content textarea:focus { outline: none; border-color: var(--primary-light); box-shadow: 0 0 0 3px rgba(42,82,152,0.1); }
        #permissionCheckboxes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        #permissionCheckboxes label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            border: 1px solid #e0e7ef;
            border-radius: 14px;
            background: #f8fafc;
            cursor: pointer;
            transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
            line-height: 1.3;
            width: 100%;
            box-sizing: border-box;
            min-height: 46px;
        }
        #permissionCheckboxes label:hover { background: #eef4fb; border-color: var(--primary-light); transform: translateY(-1px); }
        #permissionCheckboxes input[type="checkbox"] { width: 18px; height: 18px; accent-color: var(--primary); flex-shrink: 0; }
        #permissionCheckboxes label span { flex: 1; }
        #paymentAmount:focus { outline: none; border-color: #0d6efd; box-shadow: 0 0 0 4px rgba(13,110,253,0.25); background: #ffffff; color: #111; }
        .modal-content .receipt { background: #f8fafc; padding: 15px; border-radius: 8px; font-family: Inter, system-ui, sans-serif; font-size: 14px; line-height: 1.6; max-height: 520px; overflow-y: auto; margin: 15px 0; }
        .modal-content .receipt-card { width: 100%; max-width: 520px; margin: 0 auto; background: #fff; padding: 24px 26px; border-radius: 24px; box-shadow: 0 18px 60px rgba(15,23,42,.12); }
        .modal-content .receipt-header { text-align: center; margin-bottom: 20px; }
        .modal-content .receipt-header h1 { margin: 0; font-size: 22px; letter-spacing: .4px; color: #12263f; }
        .modal-content .receipt-header p { margin: 4px 0; color: #5f6f8d; font-size: 13px; }
        .modal-content .receipt-subtitle { font-weight: 700; color: #0d6efd; }
        .modal-content .receipt-meta { display: flex; justify-content: space-between; gap: 12px; font-size: 13px; color: #4b5a77; margin-bottom: 18px; }
        .modal-content .receipt-items-header { display: grid; grid-template-columns: 1fr auto; gap: 10px; font-size: 13px; font-weight: 700; color: #172b4d; border-bottom: 1px solid #e9edf5; padding-bottom: 8px; margin-bottom: 12px; }
        .modal-content .receipt-items { display: flex; flex-direction: column; gap: 12px; margin-bottom: 18px; }
        .modal-content .item-row { display: grid; grid-template-columns: 1fr auto; gap: 14px; align-items: flex-start; }
        .modal-content .item-row > div { min-width: 0; }
        .modal-content .item-name { font-weight: 700; color: #12263f; }
        .modal-content .item-meta { font-size: 12px; color: #6b7a99; margin-top: 4px; }
        .modal-content .item-total { font-weight: 700; color: #0d6efd; text-align: right; }
        .modal-content .receipt-summary { display: flex; flex-direction: column; gap: 10px; border-top: 1px solid #e9edf5; padding-top: 14px; }
        .modal-content .line-row { display: grid; grid-template-columns: 1fr auto; gap: 12px; font-size: 14px; color: #26374d; }
        .modal-content .grand-total { font-size: 16px; font-weight: 700; color: #12263f; }
        .modal-content .receipt-footer { text-align: center; margin-top: 20px; color: #5d6f85; font-size: 13px; }
        .modal-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px; flex-wrap: wrap; }
        .modal-actions button { padding: 10px 24px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; }
        .modal-actions .btn-close { background: #e0e7ef; color: #333; }
        .modal-actions .btn-close:hover { background: #c1c7cd; }
        .modal-actions .btn-print { background: var(--primary-light); color: white; }
        .modal-actions .btn-print:hover { background: var(--primary); }
        .modal-actions .btn-primary { background: var(--primary-light); color: white; }
        .modal-actions .btn-primary:hover { background: var(--primary); }

        .password-strength { display: flex; gap: 4px; margin-top: 6px; }
        .password-strength .bar { flex: 1; height: 4px; background: #e0e7ef; border-radius: 4px; transition: all 0.3s; }
        .password-strength .bar.weak { background: var(--danger); }
        .password-strength .bar.medium { background: var(--warning); }
        .password-strength .bar.strong { background: var(--success); }
        .password-requirements { margin-top: 8px; font-size: 12px; }
        .password-requirements .req { padding: 2px 0; display: flex; align-items: center; gap: 4px; }
        .password-requirements .req.valid { color: var(--success); }
        .password-requirements .req.invalid { color: var(--danger); }

        /* === TOAST === */
        .toast { position: fixed; bottom: 30px; right: 30px; background: var(--primary); color: white; padding: 14px 24px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); transform: translateY(100px); opacity: 0; transition: all 0.4s ease; z-index: 2000; max-width: 400px; }
        .toast.show { transform: translateY(0); opacity: 1; }
        .toast.success { background: var(--success); }
        .toast.error { background: var(--danger); }
        .toast.warning { background: var(--warning); }
        .toast.info { background: var(--info); }

        /* === PERMISSION INDICATORS === */
        .permission-tag { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 600; margin: 1px; }
        .permission-tag.allowed { background: #d4edda; color: #155724; }
        .permission-tag.denied { background: #f8d7da; color: #721c24; }

        /* === RESPONSIVE === */
        @media (max-width: 1024px) { .pos-layout { grid-template-columns: 1fr; height: auto; } .pos-right { height: 450px; } .dashboard-grid { grid-template-columns: 1fr; } }
        @media (max-width: 768px) {
            .header { flex-direction: column; gap: 8px; padding: 10px 16px; text-align: center; }
            .main-nav { padding: 10px 16px; gap: 6px; justify-content: flex-start; flex-wrap: nowrap; }
            .main-nav .nav-btn { padding: 8px 14px; font-size: 12px; }
            .main-nav .nav-divider { display: none; }
            .secondary-nav { padding: 0 10px; overflow-x: auto; flex-wrap: nowrap; top: 120px; }
            .secondary-nav button { padding: 8px 12px; font-size: 11px; }
            .container { padding: 12px; }
            .product-grid { grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); }
            .dashboard-stats { grid-template-columns: repeat(2, 1fr); }
            .cart-actions { grid-template-columns: 1fr 1fr; }
            .btn-checkout { grid-column: 1 / -1; }
            .management-header { flex-direction: column; align-items: stretch; }
            .modal-content { padding: 20px; margin: 10px; }
            .search-bar { flex-direction: column; }
            .search-bar input, .search-bar select { width: 100%; }
        }
        @media (max-width: 480px) { .dashboard-stats { grid-template-columns: 1fr; } .product-grid { grid-template-columns: repeat(2, 1fr); } }

        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb { background: #c1c7cd; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #a0a7af; }
    </style>
</head>
<body>

<!-- LOGIN PAGE -->
<div id="loginPage">
    <div class="login-container">
        <div class="logo">
            <h1>💊 Compound V Drugstore</h1>
            <p>Pharmacy Management System</p>
        </div>
        <form id="loginForm" onsubmit="handleLogin(event)">
            <div class="form-group">
                <label>👤 Username</label>
                <input type="text" id="loginUsername" placeholder="Enter your username" required autofocus>
            </div>
            <div class="form-group">
                <label>🔒 Password</label>
                <input type="password" id="loginPassword" placeholder="Enter your password" required>
                <button type="button" class="password-toggle" onclick="togglePassword()" id="toggleBtn">👁️</button>
            </div>
            <button type="submit" class="btn-login">🔐 Login</button>
        </form>
        <div class="register-link">
            Don't have an account? <a onclick="showRegistrationModal()">Register here</a>
        </div>
    </div>
</div>

<!-- MAIN APP -->
<div id="mainApp"></div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
// ============================================================
//  COMPOUND V DRUGSTORE – Pharmacy Management (WITH MAIN NAV BUTTONS)
// ============================================================

// === DATA STORE (localStorage) ===
let medicines = [];
let users = [];
let pendingUsers = [];
let leaveRequests = [];
let receipts = [];
let archives = [];
let activities = [];
let cart = [];
let discount = 0;
let nextOrderId = 1001;
let currentUser = null;
let productIdCounter = 13;
let userIdCounter = 5;
let pendingUserIdCounter = 3;
let leaveIdCounter = 3;
let heldCarts = [];
let roles = [];

// === ROLE DEFINITIONS ===
const DEFAULT_ROLES = [
    { name: 'Superadmin', permissions: ['all'] },
    { name: 'Admin', permissions: ['all'] },
    { name: 'Pharmacist', permissions: ['pos', 'view_products', 'edit_products', 'view_users', 'view_receipts', 'view_archives', 'view_hr'] },
    { name: 'Cashier', permissions: ['pos', 'view_products', 'view_receipts'] },
    { name: 'Staff', permissions: ['view_products', 'view_receipts'] }
];

// === PERMISSION CHECKS ===
function hasPermission(permission) {
    if (!currentUser) return false;
    const userRole = roles.find(r => r.name === currentUser.role);
    if (!userRole) return false;
    if (userRole.permissions.includes('all')) return true;
    return userRole.permissions.includes(permission);
}

function canAccessTab(tabName) {
    const tabPermissions = {
        'dashboard': 'view_dashboard',
        'pos': 'pos',
        'products': 'view_products',
        'users': 'view_users',
        'receipts': 'view_receipts',
        'archives': 'view_archives',
        'hr': 'view_hr',
        'roles': 'manage_roles'
    };
    const perm = tabPermissions[tabName];
    if (!perm) return true;
    return hasPermission(perm);
}

function canEditRoles() { return hasPermission('manage_roles') || hasPermission('all'); }
function canManageUsers() { return hasPermission('manage_users') || hasPermission('all'); }
function canManageProducts() { return hasPermission('edit_products') || hasPermission('all'); }
function canManageHR() { return hasPermission('manage_hr') || hasPermission('all'); }

function toggleDropdown(id, event) {
    if (event && event.stopPropagation) event.stopPropagation();
    const dropdown = document.getElementById(id)?.parentElement;
    if (!dropdown) return;
    dropdown.classList.toggle('open');
}

function closeDropdown(id) {
    const dropdown = document.getElementById(id)?.parentElement;
    if (!dropdown) return;
    dropdown.classList.remove('open');
}

window.addEventListener('click', (event) => {
    const target = event.target;
    if (!target.closest) return;
    document.querySelectorAll('.nav-dropdown').forEach(dropdown => {
        if (!dropdown.contains(target)) dropdown.classList.remove('open');
    });
});

// === DEFAULT DATA ===
function getDefaultMedicines() {
    return [
        { id: 1, name: 'Paracetamol 500mg', brand: 'Biogesic', category: 'Tablet', price: 8.50, stock: 120, expiryDate: '2026-12-31', status: 'active' },
        { id: 2, name: 'Ibuprofen 400mg', brand: 'Neobutin', category: 'Tablet', price: 12.00, stock: 85, expiryDate: '2026-10-15', status: 'active' },
        { id: 3, name: 'Amoxicillin 500mg', brand: 'Amoxil', category: 'Tablet', price: 25.00, stock: 45, expiryDate: '2026-09-20', status: 'active' },
        { id: 4, name: 'Cetirizine 10mg', brand: 'Zyrtec', category: 'Tablet', price: 15.00, stock: 60, expiryDate: '2026-11-05', status: 'active' },
        { id: 5, name: 'Omeprazole 20mg', brand: 'Losec', category: 'Tablet', price: 18.50, stock: 12, expiryDate: '2026-08-10', status: 'active' },
        { id: 6, name: 'Losartan 50mg', brand: 'Cozaar', category: 'Tablet', price: 22.00, stock: 40, expiryDate: '2027-01-15', status: 'active' },
        { id: 7, name: 'Metformin 500mg', brand: 'Glucophage', category: 'Tablet', price: 20.00, stock: 8, expiryDate: '2026-07-25', status: 'active' },
        { id: 8, name: 'Vitamin C 1000mg', brand: 'Cecon', category: 'Tablet', price: 10.00, stock: 200, expiryDate: '2027-03-01', status: 'active' },
        { id: 9, name: 'Zinc 50mg', brand: 'Galzin', category: 'Tablet', price: 8.00, stock: 150, expiryDate: '2027-02-14', status: 'active' },
        { id: 10, name: 'Aspirin 300mg', brand: 'Bayer', category: 'Tablet', price: 6.50, stock: 15, expiryDate: '2026-06-30', status: 'active' },
        { id: 11, name: 'Azithromycin 250mg', brand: 'Zithromax', category: 'Tablet', price: 45.00, stock: 25, expiryDate: '2027-04-20', status: 'active' },
        { id: 12, name: 'Loratadine 10mg', brand: 'Claritin', category: 'Tablet', price: 14.00, stock: 70, expiryDate: '2027-05-10', status: 'active' },
    ];
}

function getDefaultUsers() {
    return [
        { id: 1, username: 'superadmin', fullname: 'Super Administrator', password: 'Super@2026#Admin', role: 'Superadmin', status: 'active' },
        { id: 2, username: 'admin', fullname: 'System Administrator', password: 'Admin@123', role: 'Admin', status: 'active' },
        { id: 3, username: 'pharmacist', fullname: 'John Pharmacist', password: 'Pharma@123', role: 'Pharmacist', status: 'active' },
        { id: 4, username: 'cashier', fullname: 'Mary Cashier', password: 'Cash@123', role: 'Cashier', status: 'active' },
    ];
}

function getDefaultPendingUsers() {
    return [
        { id: 1, username: 'jane_doe', fullname: 'Jane Doe', email: 'jane@example.com', password: 'Jane@123', role: 'Pharmacist', notes: 'Looking forward to joining!', requestedDate: new Date(Date.now() - 86400000 * 2).toISOString(), status: 'pending' },
        { id: 2, username: 'bob_smith', fullname: 'Bob Smith', email: 'bob@example.com', password: 'Bob@123', role: 'Cashier', notes: '5 years experience', requestedDate: new Date(Date.now() - 86400000).toISOString(), status: 'pending' },
    ];
}

function getDefaultLeaveRequests() {
    return [
        { id: 1, userId: 2, username: 'pharmacist', fullname: 'John Pharmacist', type: 'Sick Leave', startDate: '2026-07-20', endDate: '2026-07-22', reason: 'Fever', status: 'pending', requestedDate: new Date(Date.now() - 86400000 * 3).toISOString() },
        { id: 2, userId: 3, username: 'cashier', fullname: 'Mary Cashier', type: 'Vacation Leave', startDate: '2026-08-01', endDate: '2026-08-05', reason: 'Family vacation', status: 'approved', requestedDate: new Date(Date.now() - 86400000 * 10).toISOString() },
    ];
}

function getDefaultRoles() {
    return JSON.parse(JSON.stringify(DEFAULT_ROLES));
}

// === LOCAL STORAGE ===
function saveToStorage() {
    try {
        localStorage.setItem('medipos_medicines', JSON.stringify(medicines));
        localStorage.setItem('medipos_users', JSON.stringify(users));
        localStorage.setItem('medipos_pendingUsers', JSON.stringify(pendingUsers));
        localStorage.setItem('medipos_leaveRequests', JSON.stringify(leaveRequests));
        localStorage.setItem('medipos_receipts', JSON.stringify(receipts));
        localStorage.setItem('medipos_archives', JSON.stringify(archives));
        localStorage.setItem('medipos_activities', JSON.stringify(activities));
        localStorage.setItem('medipos_nextOrderId', String(nextOrderId));
        localStorage.setItem('medipos_productIdCounter', String(productIdCounter));
        localStorage.setItem('medipos_userIdCounter', String(userIdCounter));
        localStorage.setItem('medipos_pendingUserIdCounter', String(pendingUserIdCounter));
        localStorage.setItem('medipos_leaveIdCounter', String(leaveIdCounter));
        localStorage.setItem('medipos_roles', JSON.stringify(roles));
        if (currentUser) {
            localStorage.setItem('medipos_currentUser', JSON.stringify(currentUser));
        } else {
            localStorage.removeItem('medipos_currentUser');
        }
    } catch (e) { console.warn('Save error:', e); }
}

function loadFromStorage() {
    try {
        const sm = localStorage.getItem('medipos_medicines');
        medicines = sm ? JSON.parse(sm) : getDefaultMedicines();
        const su = localStorage.getItem('medipos_users');
        users = su ? JSON.parse(su) : getDefaultUsers();
        const sp = localStorage.getItem('medipos_pendingUsers');
        pendingUsers = sp ? JSON.parse(sp) : getDefaultPendingUsers();
        const sl = localStorage.getItem('medipos_leaveRequests');
        leaveRequests = sl ? JSON.parse(sl) : getDefaultLeaveRequests();
        const sr = localStorage.getItem('medipos_receipts');
        receipts = sr ? JSON.parse(sr) : [];
        const sa = localStorage.getItem('medipos_archives');
        archives = sa ? JSON.parse(sa) : [];
        const sac = localStorage.getItem('medipos_activities');
        activities = sac ? JSON.parse(sac) : [];
        const sno = localStorage.getItem('medipos_nextOrderId');
        if (sno) nextOrderId = parseInt(sno);
        const spc = localStorage.getItem('medipos_productIdCounter');
        if (spc) productIdCounter = parseInt(spc);
        const suc = localStorage.getItem('medipos_userIdCounter');
        if (suc) userIdCounter = parseInt(suc);
        const spuc = localStorage.getItem('medipos_pendingUserIdCounter');
        if (spuc) pendingUserIdCounter = parseInt(spuc);
        const slc = localStorage.getItem('medipos_leaveIdCounter');
        if (slc) leaveIdCounter = parseInt(slc);
        const sr2 = localStorage.getItem('medipos_roles');
        roles = sr2 ? JSON.parse(sr2) : getDefaultRoles();
        ensureSuperadminAccount();
        const sc = localStorage.getItem('medipos_currentUser');
        if (sc) {
            const savedUser = JSON.parse(sc);
            const user = users.find(u => u.id === savedUser?.id && u.status === 'active');
            if (user) {
                user.lastLogin = savedUser.lastLogin || user.lastLogin;
                user.lastLogout = savedUser.lastLogout || user.lastLogout;
                currentUser = user;
            } else {
                currentUser = null;
            }
        }
    } catch (e) { 
        console.warn('Load error, using defaults:', e);
        medicines = getDefaultMedicines();
        users = getDefaultUsers();
        pendingUsers = getDefaultPendingUsers();
        leaveRequests = getDefaultLeaveRequests();
        roles = getDefaultRoles();
        ensureSuperadminAccount();
    }
}

function ensureSuperadminAccount() {
    const hasRole = roles.some(r => r.name === 'Superadmin');
    if (!hasRole) {
        roles.unshift({ name: 'Superadmin', permissions: ['all'] });
    }
    const existing = users.find(u => u.username.toLowerCase() === 'superadmin');
    if (!existing) {
        const maxUserId = users.reduce((max, u) => Math.max(max, u.id || 0), 0);
        const nextId = Math.max(userIdCounter, maxUserId + 1);
        users.push({ id: nextId, username: 'superadmin', fullname: 'Super Administrator', password: 'Super@2026#Admin', role: 'Superadmin', status: 'active' });
        userIdCounter = nextId + 1;
    }
    if (existing && existing.role !== 'Superadmin') {
        existing.role = 'Superadmin';
    }
}

// === EXPIRY HELPERS ===
function getExpiryStatus(expiryDate) {
    if (!expiryDate) return 'no-date';
    const today = new Date();
    const expiry = new Date(expiryDate);
    const diffDays = Math.ceil((expiry - today) / (1000 * 60 * 60 * 24));
    if (diffDays < 0) return 'expired';
    if (diffDays <= 7) return 'expiring-7';
    if (diffDays <= 30) return 'expiring-30';
    return 'good';
}

function getExpiryLabel(status) {
    const labels = {
        'expired': '❌ Expired',
        'expiring-7': '⚠️ Expires in < 7 days',
        'expiring-30': '⚠️ Expires in < 30 days',
        'good': '✅ Good',
        'no-date': '📅 No expiry'
    };
    return labels[status] || status;
}

function getExpiryColor(status) {
    const colors = {
        'expired': 'var(--danger)',
        'expiring-7': 'var(--warning)',
        'expiring-30': '#f1c40f',
        'good': 'var(--success)',
        'no-date': 'var(--gray)'
    };
    return colors[status] || 'var(--gray)';
}

function getExpiryBadgeClass(status) {
    const classes = {
        'expired': 'expired',
        'expiring-7': 'expiring',
        'expiring-30': 'expiring',
        'good': 'good',
        'no-date': ''
    };
    return classes[status] || '';
}

function isExpired(expiryDate) { return getExpiryStatus(expiryDate) === 'expired'; }
function getDaysUntilExpiry(expiryDate) {
    if (!expiryDate) return null;
    return Math.ceil((new Date(expiryDate) - new Date()) / (1000 * 60 * 60 * 24));
}

// === PASSWORD VALIDATION ===
function validatePassword(password) {
    const requirements = {
        minLength: password.length >= 8,
        hasLower: /[a-z]/.test(password),
        hasUpper: /[A-Z]/.test(password),
        hasNumber: /\d/.test(password),
        hasSymbol: /[!@#$%^&*(),.?":{}|<>]/.test(password)
    };
    const isValid = Object.values(requirements).every(Boolean);
    return { isValid, requirements };
}

function getPasswordStrength(password) {
    const { requirements } = validatePassword(password);
    const score = Object.values(requirements).filter(Boolean).length;
    if (score <= 2) return { label: 'Weak', class: 'weak' };
    if (score <= 4) return { label: 'Medium', class: 'medium' };
    return { label: 'Strong', class: 'strong' };
}

// === TOAST ===
function showToast(message, type = 'info') {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.className = `toast ${type}`;
    clearTimeout(toast._timeout);
    void toast.offsetWidth;
    toast.classList.add('show');
    toast._timeout = setTimeout(() => toast.classList.remove('show'), 3000);
}

function addActivity(message) {
    activities.unshift({ message, time: new Date().toISOString() });
    if (activities.length > 100) activities = activities.slice(0, 100);
    saveToStorage();
}

function closeModal(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove('active');
}

function openModal(id) {
    const el = document.getElementById(id);
    if (el) el.classList.add('active');
}

// === LOGIN ===
function togglePassword() {
    const input = document.getElementById('loginPassword');
    const btn = document.getElementById('toggleBtn');
    if (input.type === 'password') { input.type = 'text'; btn.textContent = '🙈'; btn.title = 'Hide'; } 
    else { input.type = 'password'; btn.textContent = '👁️'; btn.title = 'Show'; }
}

function handleLogin(e) {
    e.preventDefault();
    const username = document.getElementById('loginUsername').value.trim();
    const password = document.getElementById('loginPassword').value;

    if (!username || !password) { showToast('❌ Please fill all fields', 'error'); return; }

    const usernameLower = username.toLowerCase();
    const user = users.find(u => u.username.toLowerCase() === usernameLower && u.status === 'active');
    if (!user || user.password !== password) {
        showToast('❌ Invalid username or password', 'error');
        return;
    }

    const now = new Date().toISOString();
    user.lastLogin = now;
    currentUser = user;
    saveToStorage();
    showToast(`✅ Welcome, ${user.fullname}!`, 'success');
    addActivity(`User logged in: ${user.username}`);

    document.getElementById('loginPage').style.display = 'none';
    document.getElementById('mainApp').style.display = 'block';
    renderMainApp();
    initApp();
}

// === RENDER MAIN APP ===
function renderMainApp() {
    const roleOptions = getRoleOptions(currentUser?.role === 'Superadmin');
    const registerRoleOptions = getRoleOptions(false);
    
    document.getElementById('mainApp').innerHTML = `
    <header class="header">
        <div><h1>💊 Compound V Drugstore</h1><div class="date-time" id="dateTime"></div></div>
        <div class="user-info">
            <div>
                <div id="currentUserDisplay">👤 ${currentUser.fullname}</div>
                <div class="session-meta">
                    <span id="userLoginInfo">Logged in: N/A</span>
                    <span id="userLogoutInfo">Last logout: N/A</span>
                </div>
            </div>
            <span class="role-badge">${currentUser.role}</span>
            <div class="avatar" id="userAvatar">${currentUser.fullname.charAt(0).toUpperCase()}</div>
            <button class="logout-btn" onclick="logout()">🚪 Logout</button>
        </div>
    </header>

    <!-- MAIN NAVIGATION BUTTONS -->
    <nav class="main-nav" id="mainNav">
        <button class="nav-btn primary-btn active" data-tab="dashboard" onclick="switchMainTab('dashboard')">
            📊 Dashboard
        </button>
        <div class="nav-dropdown">
            <button class="nav-btn success-btn nav-dropdown-toggle" type="button" onclick="toggleDropdown('posMenu', event); switchMainTab('pos')">
                🛒 POINT OF SALE <span class="dropdown-arrow">▾</span>
            </button>
            <div class="dropdown-menu" id="posMenu">
                <button class="dropdown-item" type="button" onclick="switchMainTab('pos'); closeDropdown('posMenu')">
                    <span class="dropdown-item-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 4H3v2h2l3.6 7.59-1.35 2.45C6.89 16.37 7.48 17 8.24 17H19v-2H8.53c-.09 0-.17-.05-.21-.13L9.1 13h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49L21.15 4H7z" fill="#2b6cb0"/></svg>
                    </span>
                    <span class="dropdown-item-text">POS</span>
                </button>
                <button class="dropdown-item" type="button" onclick="switchMainTab('products'); closeDropdown('posMenu')">
                    <span class="dropdown-item-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" fill="#2b6cb0"/></svg>
                    </span>
                    <span class="dropdown-item-text">Products</span>
                </button>
                <button class="dropdown-item" type="button" onclick="switchMainTab('receipts'); closeDropdown('posMenu')">
                    <span class="dropdown-item-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 6h-6l-2-2H7a1 1 0 0 0-1 1v14l3-2 3 2 3-2 5 2V7a1 1 0 0 0-1-1z" fill="#2b6cb0"/></svg>
                    </span>
                    <span class="dropdown-item-text">Sales History</span>
                </button>
            </div>
        </div>
        <div class="nav-divider"></div>
        <button class="nav-btn info-btn" data-tab="users" onclick="switchMainTab('users')">
            👥 Users <span class="badge" id="userBadge"></span>
        </button>
        <button class="nav-btn info-btn" data-tab="archives" onclick="switchMainTab('archives')">
            📦 Archives
        </button>
        <button class="nav-btn info-btn" data-tab="hr" onclick="switchMainTab('hr')">
            👔 HR <span class="badge" id="hrBadge"></span>
        </button>
        <button class="nav-btn danger-btn" data-tab="roles" onclick="switchMainTab('roles')">
            🔑 Roles
        </button>
    </nav>

    <!-- SECONDARY NAV (Contextual sub-tabs) -->
    <nav class="secondary-nav" id="secondaryNav">
        <!-- Dynamically populated based on main tab -->
    </nav>

    <div class="container">
        <!-- Dashboard -->
        <div class="tab-content active" id="tab-dashboard">
            <div id="expiryAlertBanner"></div>
            <div class="dashboard-stats" id="dashboardStats">
                <div class="stat-card"><div class="stat-number" id="statRevenue">₱0</div><div class="stat-label">Today's Revenue</div></div>
                <div class="stat-card"><div class="stat-number" id="statSales">0</div><div class="stat-label">Today's Sales</div></div>
                <div class="stat-card"><div class="stat-number" id="statProducts">0</div><div class="stat-label">Total Products</div></div>
                <div class="stat-card"><div class="stat-number" id="statLowStock">0</div><div class="stat-label">Low Stock Items</div></div>
                <div class="stat-card"><div class="stat-number" id="statExpiring">0</div><div class="stat-label">Expiring Soon</div></div>
                <div class="stat-card"><div class="stat-number" id="statUsers">0</div><div class="stat-label">Active Users</div></div>
                <div class="stat-card clickable" onclick="switchMainTab('hr')"><div class="stat-number" id="statPendingLeaves">0</div><div class="stat-label">Pending Leaves</div></div>
                <div class="stat-card clickable" onclick="switchMainTab('users')"><div class="stat-number" id="statPendingUsers">0</div><div class="stat-label">Pending Approvals</div></div>
            </div>
            <div class="dashboard-grid">
                <div class="dashboard-card"><h3>🕐 Recent Activity</h3><div class="recent-activity" id="recentActivity"><div style="color:#999;text-align:center;padding:20px;">No recent activity</div></div></div>
                <div class="dashboard-card"><h3>⚠️ Alerts</h3><div class="low-stock-list" id="lowStockList"><div style="color:#999;text-align:center;padding:20px;">All items are well-stocked</div></div></div>
            </div>
        </div>

        <!-- POS -->
        <div class="tab-content" id="tab-pos">
            <div class="pos-layout">
                <div class="pos-left">
                    <div class="search-section">
                        <div class="search-bar">
                            <input type="text" id="searchInput" placeholder="🔍 Search medicines..." oninput="filterProducts()">
                            <select id="categoryFilter" onchange="filterProducts()"><option value="">All Categories</option><option value="Tablet">Tablet</option><option value="Liquid">Liquid</option></select>
                            <select id="expiryFilter" onchange="filterProducts()"><option value="">All Expiry</option><option value="good">✅ Good</option><option value="expiring">⚠️ Expiring Soon</option><option value="expired">❌ Expired</option></select>
                        </div>
                        <div class="product-grid" id="productGrid"></div>
                    </div>
                </div>
                <div class="pos-right">
                    <div class="cart-header"><h2>🛒 Current Cart</h2><span class="item-count" id="itemCount">0 items</span></div>
                    <div class="cart-table-header"><div>Item</div><div>Qty</div><div>Price</div><div>Action</div></div>
                    <div class="cart-items" id="cartItems"><div class="empty-cart"><div class="icon">📦</div><p>No items in cart</p><small>Click on a medicine to add</small></div></div>
                    <div class="cart-footer">
                        <div class="senior-discount-row"><label><input type="checkbox" id="seniorDiscountCheckbox" onchange="toggleSeniorDiscount()"> Senior Citizen Discount</label></div>
                        <div class="senior-id-row hidden" id="seniorIdRow"><label for="seniorDiscountId">Senior Citizen ID</label><div class="senior-id-input"><span>OSCA-</span><input type="text" id="seniorDiscountId" placeholder="123456-7686" maxlength="11" pattern="[0-9]{6}-[0-9]{4}" inputmode="numeric" oninput="formatSeniorIdInput()"></div></div>
                        <div id="seniorDiscountStatus" class="senior-discount-status"></div>
                        <div class="cart-summary"><span>Subtotal</span><span id="subtotal">₱0.00</span></div>
                        <div class="cart-summary"><span>Discount</span><span id="discountDisplay">₱0.00</span></div>
                        <div class="cart-summary"><span>Amount Tendered</span><span><input type="number" id="paymentAmount" value="0.00" min="0" step="0.01" oninput="updateCartUI()" style="width:120px;text-align:right;padding:6px 8px;border:2px solid #e0e7ef;border-radius:8px;background:white;color:#333;" placeholder="₱0.00"></span></div>
                        <div class="cart-summary total"><span>Total</span><span id="total">₱0.00</span></div>
                        <div class="cart-summary"><span>Change Back</span><span id="changeDue">₱0.00</span></div>
                        <div class="cart-actions">
                            <button class="btn-clear" onclick="clearCart()">🗑️ Clear</button>
                            <button class="btn-checkout" onclick="checkout()">✅ Complete Checkout Process</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="tab-content" id="tab-products">
            <div class="management-header"><h2>💊 Product Management</h2><div>${canManageProducts() ? `<button class="btn btn-success" onclick="showAddProductModal()">➕ Add Product</button>` : ''}<button class="btn btn-warning" onclick="showArchiveModal('product')">📦 View Archive</button></div></div>
            <div class="table-container"><table><thead><tr><th>ID</th><th>Name</th><th>Brand</th><th>Category</th><th>Price</th><th>Stock</th><th>Expiry Date</th><th>Status</th><th>Actions</th></tr></thead><tbody id="productTableBody"></tbody></table></div>
        </div>

        <!-- Users -->
        <div class="tab-content" id="tab-users">
            <div class="management-header"><h2>👥 User Management</h2><div>${canManageUsers() ? `<button class="btn btn-success" onclick="showAddUserModal()">➕ Add User</button>` : ''}<button class="btn btn-warning" onclick="showArchiveModal('user')">📦 View Archive</button></div></div>
            <div id="pendingUsersSection" style="margin-bottom:20px;display:none;"><h3 style="color:var(--warning);margin-bottom:10px;">⏳ Pending Approvals</h3><div class="table-container"><table><thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Role</th><th>Requested</th><th>Actions</th></tr></thead><tbody id="pendingUserTableBody"></tbody></table></div></div>
            <h3 style="margin-bottom:10px;">✅ Active Users</h3>
            <div class="table-container"><table><thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Role</th><th>Last Login</th><th>Last Logout</th><th>Status</th><th>Actions</th></tr></thead><tbody id="userTableBody"></tbody></table></div>
        </div>

        <!-- Receipts -->
        <div class="tab-content" id="tab-receipts">
            <div class="management-header"><h2>🧾 Receipt History</h2><div><input type="date" id="receiptDateFilter" onchange="filterReceipts()" style="padding:8px 14px;border:2px solid #e0e7ef;border-radius:8px;"><button class="btn btn-primary" onclick="filterReceipts()">🔍 Filter</button><button class="btn btn-warning" onclick="clearReceiptFilter()">🔄 Clear</button></div></div>
            <div class="table-container"><table><thead><tr><th>Order #</th><th>Date</th><th>Items</th><th>Subtotal</th><th>Senior ID</th><th>Total</th><th>Actions</th></tr></thead><tbody id="receiptTableBody"></tbody></table></div>
        </div>

        <!-- Archives -->
        <div class="tab-content" id="tab-archives">
            <div class="management-header"><h2>📦 Archives</h2><div><select id="archiveTypeFilter" onchange="renderArchives()" style="padding:8px 14px;border:2px solid #e0e7ef;border-radius:8px;"><option value="all">All Archives</option><option value="product">Products</option><option value="user">Users</option></select><button class="btn btn-danger" onclick="clearAllArchives()">🗑️ Clear All</button></div></div>
            <div class="table-container"><table><thead><tr><th>Type</th><th>Name/Description</th><th>Archived Date</th><th>Actions</th></tr></thead><tbody id="archiveTableBody"></tbody></table></div>
        </div>

        <!-- HR -->
        <div class="tab-content" id="tab-hr">
            <div class="management-header"><h2>👔 HR Management</h2><div><button class="btn btn-success" onclick="showLeaveRequestModal()">📝 Request Leave</button><button class="btn btn-info" onclick="showRegistrationModal()">📝 Register Account</button></div></div>
            <h3 style="margin:20px 0 10px;">📋 Leave Requests</h3>
            <div class="table-container"><table><thead><tr><th>ID</th><th>Employee</th><th>Type</th><th>From</th><th>To</th><th>Reason</th><th>Status</th><th>Actions</th></tr></thead><tbody id="leaveTableBody"></tbody></table></div>
            <h3 style="margin:20px 0 10px;">📝 Registration Requests</h3>
            <div class="table-container"><table><thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Role</th><th>Requested</th><th>Status</th><th>Actions</th></tr></thead><tbody id="registrationTableBody"></tbody></table></div>
        </div>

        <!-- Roles -->
        <div class="tab-content" id="tab-roles">
            <div class="management-header"><h2>🔑 Role Management</h2><div>${canEditRoles() ? `<button class="btn btn-success" onclick="showAddRoleModal()">➕ Add Role</button>` : ''}</div></div>
            <div class="table-container"><table><thead><tr><th>Role Name</th><th>Permissions</th><th>Actions</th></tr></thead><tbody id="roleTableBody"></tbody></table></div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal" id="productModal"><div class="modal-content"><h2 id="productModalTitle">Add Product</h2><input type="hidden" id="editProductId"><div class="form-group"><label>Product Name *</label><input type="text" id="prodName"></div><div class="form-group"><label>Brand Name *</label><input type="text" id="prodBrand"></div><div class="form-group"><label>Category *</label><select id="prodCategory"><option value="Tablet">Tablet</option><option value="Liquid">Liquid</option></select></div><div class="form-group"><label>Price (₱) *</label><input type="number" id="prodPrice" step="0.01" min="0"></div><div class="form-group"><label>Stock *</label><input type="number" id="prodStock" min="0"></div><div class="form-group"><label>Expiration Date</label><input type="date" id="prodExpiry"><small style="color:#888;font-size:12px;">Leave empty if no expiry</small></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('productModal')">Cancel</button><button class="btn-primary" onclick="saveProduct()">💾 Save</button></div></div></div>

    <div class="modal" id="userModal"><div class="modal-content"><h2 id="userModalTitle">Add User</h2><input type="hidden" id="editUserId"><div class="form-group"><label>Username *</label><input type="text" id="userUsername"></div><div class="form-group"><label>Full Name *</label><input type="text" id="userFullname"></div><div class="form-group"><label>Password *</label><input type="password" id="userPassword" placeholder="min 8 chars, upper, lower, number, symbol"></div><div class="form-group"><label>Role *</label><select id="userRole">${roleOptions}</select></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('userModal')">Cancel</button><button class="btn-primary" onclick="saveUser()">💾 Save</button></div></div></div>

    <div class="modal" id="registrationModal"><div class="modal-content"><h2>📝 Register Account</h2><div class="registration-info"><strong>📌 Note:</strong> Your account will be submitted for approval.</div><div class="form-group"><label>Username *</label><input type="text" id="regUsername"></div><div class="form-group"><label>Full Name *</label><input type="text" id="regFullname"></div><div class="form-group"><label>Email *</label><input type="email" id="regEmail"></div><div class="form-group"><label>Password *</label><input type="password" id="regPassword" oninput="checkRegistrationPassword()"><div class="password-strength" id="regPasswordStrength"><div class="bar"></div><div class="bar"></div><div class="bar"></div></div><div class="password-requirements" id="regPasswordRequirements"><div class="req invalid" id="reqLength"><span class="icon">❌</span> At least 8 characters</div><div class="req invalid" id="reqLower"><span class="icon">❌</span> Lowercase letter</div><div class="req invalid" id="reqUpper"><span class="icon">❌</span> Uppercase letter</div><div class="req invalid" id="reqNumber"><span class="icon">❌</span> Number</div><div class="req invalid" id="reqSymbol"><span class="icon">❌</span> Symbol (!@#$%^&*)</div></div></div><div class="form-group"><label>Confirm Password *</label><input type="password" id="regConfirmPassword" oninput="checkRegistrationPassword()"></div><div class="form-group"><label>Role *</label><select id="regRole">${roleOptions}</select></div><div class="form-group"><label>Additional Notes</label><textarea id="regNotes"></textarea></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('registrationModal')">Cancel</button><button class="btn-primary" onclick="submitRegistration()">📤 Submit</button></div></div></div>

    <div class="modal" id="leaveModal"><div class="modal-content"><h2>📝 Request Leave</h2><div class="form-group"><label>Leave Type *</label><select id="leaveType"><option value="Sick Leave">🤒 Sick Leave</option><option value="Vacation Leave">🏖️ Vacation Leave</option><option value="Emergency Leave">🚨 Emergency Leave</option><option value="Maternity/Paternity Leave">👶 Maternity/Paternity Leave</option><option value="Bereavement Leave">💔 Bereavement Leave</option><option value="Other">📋 Other</option></select></div><div class="form-group"><label>Start Date *</label><input type="date" id="leaveStart"></div><div class="form-group"><label>End Date *</label><input type="date" id="leaveEnd"></div><div class="form-group"><label>Reason *</label><textarea id="leaveReason"></textarea></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('leaveModal')">Cancel</button><button class="btn-primary" onclick="submitLeaveRequest()">📤 Submit</button></div></div></div>

    <div class="modal" id="receiptModal"><div class="modal-content"><h2>🧾 Receipt</h2><div class="receipt" id="receiptContent"></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('receiptModal')">Close</button><button class="btn-print" onclick="printReceipt()">🖨️ Print</button></div></div></div>

    <div class="modal" id="archiveModal"><div class="modal-content"><h2>📦 Archive</h2><div id="archiveContent" style="max-height:400px;overflow-y:auto;"><div style="color:#999;text-align:center;padding:20px;">Loading...</div></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('archiveModal')">Close</button></div></div></div>

    <div class="modal" id="roleModal"><div class="modal-content"><h2 id="roleModalTitle">Add Role</h2><input type="hidden" id="editRoleName"><div class="form-group"><label>Role Name *</label><input type="text" id="roleName" placeholder="e.g., Manager"></div><div class="form-group"><label>Permissions</label><div id="permissionCheckboxes"></div></div><div class="modal-actions"><button class="btn-close" onclick="closeModal('roleModal')">Cancel</button><button class="btn-primary" onclick="saveRole()">💾 Save</button></div></div></div>
    `;
}

// === PERMISSION DEFINITIONS ===
const AVAILABLE_PERMISSIONS = [
    { id: 'pos', label: '🛒 Point of Sale' },
    { id: 'view_products', label: '👁️ View Products' },
    { id: 'edit_products', label: '✏️ Edit Products' },
    { id: 'view_users', label: '👁️ View Users' },
    { id: 'manage_users', label: '👥 Manage Users' },
    { id: 'view_receipts', label: '🧾 View Receipts' },
    { id: 'view_archives', label: '📦 View Archives' },
    { id: 'view_hr', label: '👔 View HR' },
    { id: 'manage_hr', label: '⚙️ Manage HR' },
    { id: 'manage_roles', label: '🔑 Manage Roles' },
    { id: 'view_dashboard', label: '📊 View Dashboard' }
];

// === MAIN NAVIGATION ===
function switchMainTab(tabName) {
    // Check permission
    if (!canAccessTab(tabName)) { 
        showToast('❌ You don\'t have permission to access this section', 'error'); 
        return; 
    }
    
    // Update main nav buttons
    document.querySelectorAll('.main-nav .nav-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.dataset.tab === tabName) btn.classList.add('active');
    });
    
    // Show the tab
    document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
    const tab = document.getElementById(`tab-${tabName}`);
    if (tab) tab.classList.add('active');
    
    // Update secondary navigation
    updateSecondaryNav(tabName);
    
    // Render content based on tab
    if (tabName === 'dashboard') { updateDashboard(); checkExpiryAlerts(); }
    else if (tabName === 'products') renderProductTable();
    else if (tabName === 'pos') { renderProducts(); updateCartUI(); }
    else if (tabName === 'users') { renderUserTable(); renderPendingUsers(); setUserSubtab('all'); }
    else if (tabName === 'receipts') renderReceiptTable();
    else if (tabName === 'archives') renderArchives();
    else if (tabName === 'hr') { renderLeaveRequests(); renderRegistrations(); }
    else if (tabName === 'roles') renderRoleTable();
    
    updateBadges();
}

function updateSecondaryNav(mainTab) {
    const container = document.getElementById('secondaryNav');
    if (!container) return;
    
    const subTabs = {
        'pos': [
            { tab: 'pos', label: '🛒 Point of Sale', active: true }
        ],
        'products': [
            { tab: 'products', label: '💊 All Products', active: true }
        ],
        'users': [
            { tab: 'users', label: '👥 All Users', active: true, action: 'showAllUsers()' },
            { tab: 'users', label: '⏳ Pending Approvals', active: false, action: 'showPendingUsers()' }
        ],
        'receipts': [
            { tab: 'receipts', label: '🧾 All Receipts', active: true }
        ],
        'hr': [
            { tab: 'hr', label: '👔 Leave Requests', active: true },
            { tab: 'hr-registrations', label: '📝 Registrations', active: false, action: 'showRegistrations()' }
        ],
        'roles': [
            { tab: 'roles', label: '🔑 Roles', active: true }
        ],
        'archives': [
            { tab: 'archives', label: '📦 Archives', active: true }
        ],
        'dashboard': [
            { tab: 'dashboard', label: '📊 Dashboard', active: true }
        ]
    };
    
    const tabs = subTabs[mainTab] || [];
    if (tabs.length === 0) {
        container.innerHTML = '';
        container.style.display = 'none';
        return;
    }
    container.style.display = 'flex';

    container.innerHTML = tabs.map(t => {
        const isActive = t.active ? 'active' : '';
        const isDisabled = !canAccessTab(t.tab) ? 'disabled' : '';
        if (t.action) {
            return `<button class="${isActive}" data-action="${t.action}" ${isDisabled} onclick="${t.action}">${t.label}</button>`;
        }
        return `<button class="${isActive}" ${isDisabled} onclick="switchMainTab('${t.tab}')">${t.label}</button>`;
    }).join('');
}

function setUserSubtab(tabName) {
    const section = document.getElementById('pendingUsersSection');
    if (section) section.style.display = tabName === 'pending' ? 'block' : 'none';
    updateUserSubtabActive(tabName);
}

function showPendingUsers() {
    setUserSubtab('pending');
    const section = document.getElementById('pendingUsersSection');
    if (section) section.scrollIntoView({ behavior: 'smooth' });
}

function showAllUsers() {
    setUserSubtab('all');
}

function updateUserSubtabActive(tabName) {
    const container = document.getElementById('secondaryNav');
    if (!container) return;
    Array.from(container.querySelectorAll('button')).forEach(btn => {
        const action = btn.getAttribute('data-action');
        const isActive = tabName === 'pending' ? action === 'showPendingUsers()' : action === 'showAllUsers()';
        btn.classList.toggle('active', isActive);
    });
}

function showRegistrations() { switchMainTab('hr'); document.getElementById('registrationTableBody').scrollIntoView({ behavior: 'smooth' }); }

function updateBadges() {
    const pendingUserCount = pendingUsers.filter(u => u.status === 'pending').length;
    const userBadge = document.getElementById('userBadge');
    if (userBadge) {
        if (pendingUserCount > 0) {
            userBadge.textContent = pendingUserCount;
            userBadge.style.display = 'inline';
        } else {
            userBadge.style.display = 'none';
        }
    }
    
    const pendingLeaveCount = leaveRequests.filter(l => l.status === 'pending').length;
    const hrBadge = document.getElementById('hrBadge');
    if (hrBadge) {
        const total = pendingLeaveCount + pendingUserCount;
        if (total > 0) {
            hrBadge.textContent = total;
            hrBadge.style.display = 'inline';
        } else {
            hrBadge.style.display = 'none';
        }
    }
}

// === ROLE MANAGEMENT FUNCTIONS ===
function renderRoleTable() {
    const tbody = document.getElementById('roleTableBody');
    if (!tbody) return;
    if (roles.length === 0) {
        tbody.innerHTML = `<tr><td colspan="3" style="text-align:center;padding:30px;color:#999;">No roles defined</td></tr>`;
        return;
    }
    tbody.innerHTML = roles.map(r => {
        const isBuiltIn = ['Admin', 'Pharmacist', 'Cashier', 'Staff'].includes(r.name);
        const permLabels = r.permissions.includes('all') ? ['🔓 All Permissions'] :
            r.permissions.map(p => {
                const found = AVAILABLE_PERMISSIONS.find(ap => ap.id === p);
                return found ? found.label : p;
            });
        return `<tr>
            <td><strong>${r.name}</strong></td>
            <td>${permLabels.map(p => `<span class="permission-tag allowed">${p}</span>`).join(' ')}</td>
            <td>
                <div class="table-actions">
                    ${canEditRoles() ? `<button class="edit-btn" onclick="editRole('${r.name}')">✏️ Edit</button>` : ''}
                    ${isBuiltIn ? '<span style="font-size:11px;color:#888;">(Built-in)</span>' : ''}
                </div>
            </td>
        </tr>`;
    }).join('');
}

function showAddRoleModal() {
    if (!canEditRoles()) { showToast('❌ You don\'t have permission to manage roles', 'error'); return; }
    document.getElementById('roleModalTitle').textContent = 'Add Role';
    document.getElementById('editRoleName').value = '';
    document.getElementById('roleName').value = '';
    renderPermissionCheckboxes([]);
    openModal('roleModal');
}

function editRole(roleName) {
    if (!canEditRoles()) { showToast('❌ You don\'t have permission to manage roles', 'error'); return; }
    const role = roles.find(r => r.name === roleName);
    if (!role) { showToast('❌ Role not found', 'error'); return; }
    document.getElementById('roleModalTitle').textContent = 'Edit Role';
    document.getElementById('editRoleName').value = roleName;
    document.getElementById('roleName').value = roleName;
    renderPermissionCheckboxes(role.permissions);
    openModal('roleModal');
}

function renderPermissionCheckboxes(selectedPermissions) {
    const container = document.getElementById('permissionCheckboxes');
    if (!container) return;
    container.innerHTML = AVAILABLE_PERMISSIONS.map(p => `
        <div style="margin:4px 0;">
            <label style="display:flex;align-items:center;gap:8px;font-weight:400;cursor:pointer;">
                <input type="checkbox" value="${p.id}" ${selectedPermissions.includes(p.id) ? 'checked' : ''}>
                ${p.label}
            </label>
        </div>
    `).join('');
    container.innerHTML += `
        <div style="margin:8px 0;padding-top:8px;border-top:1px solid #e0e7ef;">
            <label style="display:flex;align-items:center;gap:8px;font-weight:600;cursor:pointer;color:var(--primary);">
                <input type="checkbox" id="allPermissionsCheckbox" value="all" ${selectedPermissions.includes('all') ? 'checked' : ''} onchange="toggleAllPermissions()">
                🔓 All Permissions (Full Access)
            </label>
        </div>
    `;
}

function toggleAllPermissions() {
    const checked = document.getElementById('allPermissionsCheckbox').checked;
    document.querySelectorAll('#permissionCheckboxes input[type="checkbox"]').forEach(cb => {
        if (cb.id !== 'allPermissionsCheckbox') cb.checked = checked;
    });
}

function saveRole() {
    const roleName = document.getElementById('roleName').value.trim();
    const editName = document.getElementById('editRoleName').value;
    if (!roleName) { showToast('❌ Role name is required', 'error'); return; }
    
    const checkboxes = document.querySelectorAll('#permissionCheckboxes input[type="checkbox"]:checked:not(#allPermissionsCheckbox)');
    const permissions = Array.from(checkboxes).map(cb => cb.value).filter(Boolean);
    const allChecked = document.getElementById('allPermissionsCheckbox')?.checked;
    const finalPermissions = allChecked ? ['all'] : permissions;
    
    if (finalPermissions.length === 0) { showToast('❌ Please select at least one permission', 'error'); return; }

    if (editName) {
        const existing = roles.find(r => r.name === editName);
        if (existing) {
            existing.name = roleName;
            existing.permissions = finalPermissions;
            showToast('✅ Role updated!', 'success');
            addActivity(`Updated role: ${roleName}`);
        }
    } else {
        if (roles.find(r => r.name === roleName)) {
            showToast('❌ Role already exists', 'error');
            return;
        }
        roles.push({ name: roleName, permissions: finalPermissions });
        showToast('✅ Role added!', 'success');
        addActivity(`Added role: ${roleName}`);
    }
    
    updateRoleDropdowns();
    closeModal('roleModal');
    renderRoleTable();
    saveToStorage();
}

function deleteRole(roleName) {
    if (!canEditRoles()) { showToast('❌ You don\'t have permission to manage roles', 'error'); return; }
    const builtIn = ['Admin', 'Pharmacist', 'Cashier', 'Staff'];
    if (builtIn.includes(roleName)) { showToast('❌ Cannot delete built-in roles', 'error'); return; }
    if (!confirm(`Delete role "${roleName}"? Users with this role will be affected.`)) return;
    const usersWithRole = users.filter(u => u.role === roleName && u.status === 'active');
    if (usersWithRole.length > 0) {
        if (!confirm(`${usersWithRole.length} user(s) have this role. They will be set to 'Staff'. Continue?`)) return;
        usersWithRole.forEach(u => u.role = 'Staff');
    }
    roles = roles.filter(r => r.name !== roleName);
    showToast('🗑️ Role deleted', 'error');
    addActivity(`Deleted role: ${roleName}`);
    updateRoleDropdowns();
    renderRoleTable();
    renderUserTable();
    saveToStorage();
}

function archiveRole(roleName) {
    if (!canEditRoles()) { showToast('❌ You don\'t have permission to archive roles', 'error'); return; }
    const builtIn = ['Admin', 'Pharmacist', 'Cashier', 'Staff'];
    if (builtIn.includes(roleName)) { showToast('❌ Cannot archive built-in roles', 'error'); return; }
    if (!confirm(`Archive role "${roleName}"?`)) return;
    const usersWithRole = users.filter(u => u.role === roleName && u.status === 'active');
    if (usersWithRole.length > 0) {
        if (!confirm(`${usersWithRole.length} user(s) are assigned to this role. They will be set to 'Staff'. Continue?`)) return;
        usersWithRole.forEach(u => u.role = 'Staff');
    }
    const role = roles.find(r => r.name === roleName);
    if (!role) { showToast('❌ Role not found', 'error'); return; }
    roles = roles.filter(r => r.name !== roleName);
    archives.push({ type: 'role', id: Date.now(), name: role.name, details: `Permissions: ${role.permissions.join(', ')}`, archivedDate: new Date().toISOString() });
    showToast('📦 Role archived', 'warning');
    addActivity(`Archived role: ${roleName}`);
    updateRoleDropdowns();
    renderRoleTable();
    renderUserTable();
    saveToStorage();
}

function getRoleOptions(includeSuperadmin = false) {
    return roles
        .filter(role => includeSuperadmin || role.name.toLowerCase() !== 'superadmin')
        .map(role => `<option value="${role.name}">${role.name}</option>`)
        .join('');
}

function updateRoleDropdowns() {
    const roleOptions = getRoleOptions(currentUser?.role === 'Superadmin');
    const registerRoleOptions = getRoleOptions(false);
    const userRoleSelect = document.getElementById('userRole');
    if (userRoleSelect) userRoleSelect.innerHTML = roleOptions;
    const regRoleSelect = document.getElementById('regRole');
    if (regRoleSelect) regRoleSelect.innerHTML = registerRoleOptions;
}

// === INIT APP ===
function formatTimestamp(value) {
    if (!value) return 'N/A';
    return new Date(value).toLocaleString('en-PH', { weekday:'short', year:'numeric', month:'short', day:'numeric', hour:'2-digit', minute:'2-digit', second:'2-digit' });
}

function renderUserSessionInfo() {
    const loginEl = document.getElementById('userLoginInfo');
    const logoutEl = document.getElementById('userLogoutInfo');
    if (loginEl) loginEl.textContent = `Logged in: ${formatTimestamp(currentUser?.lastLogin)}`;
    if (logoutEl) logoutEl.textContent = `Last logout: ${formatTimestamp(currentUser?.lastLogout)}`;
}

function initApp() {
    document.getElementById('currentUserDisplay').textContent = `👤 ${currentUser.fullname}`;
    document.getElementById('userAvatar').textContent = currentUser.fullname.charAt(0).toUpperCase();
    setupNavigation();
    renderAll();
    renderUserSessionInfo();
    updateDateTime();
    setInterval(updateDateTime, 1000);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') document.querySelectorAll('.modal.active').forEach(m => m.classList.remove('active'));
        if (e.ctrlKey && e.key >= '1' && e.key <= '8') {
            e.preventDefault();
            const tabs = ['dashboard','pos','products','receipts','users','archives','hr','roles'];
            const idx = parseInt(e.key) - 1;
            if (idx < tabs.length) switchMainTab(tabs[idx]);
        }
    });
}

function updateDateTime() {
    const el = document.getElementById('dateTime');
    if (el) el.textContent = new Date().toLocaleString('en-PH', { weekday:'short', year:'numeric', month:'short', day:'numeric', hour:'2-digit', minute:'2-digit', second:'2-digit' });
}

function setupNavigation() {
    // Secondary nav initial setup
    updateSecondaryNav('dashboard');
    updateBadges();
}

// === DASHBOARD ===
function updateDashboard() {
    const today = new Date().toDateString();
    const todayReceipts = receipts.filter(r => new Date(r.date).toDateString() === today);
    const todayRevenue = todayReceipts.reduce((s, r) => s + r.total, 0);
    const setText = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
    setText('statRevenue', `₱${todayRevenue.toFixed(2)}`);
    setText('statSales', todayReceipts.length);
    const activeProducts = medicines.filter(m => m.status === 'active');
    setText('statProducts', activeProducts.length);
    const lowStock = activeProducts.filter(m => m.stock < 20);
    setText('statLowStock', lowStock.length);
    const expiring = activeProducts.filter(m => { if (!m.expiryDate) return false; const s = getExpiryStatus(m.expiryDate); return s === 'expiring-7' || s === 'expiring-30'; });
    setText('statExpiring', expiring.length);
    setText('statUsers', users.filter(u => u.status === 'active').length);
    setText('statPendingLeaves', leaveRequests.filter(l => l.status === 'pending').length);
    setText('statPendingUsers', pendingUsers.filter(u => u.status === 'pending').length);

    const container = document.getElementById('lowStockList');
    if (container) {
        const alerts = [];
        lowStock.forEach(m => { const s = m.expiryDate ? getExpiryStatus(m.expiryDate) : 'no-date'; alerts.push({ type: 'stock', name: m.name, detail: `Stock: ${m.stock}`, status: m.stock < 10 ? 'critical' : 'low', expiryStatus: s }); });
        expiring.forEach(m => { if (m.stock >= 20) { const days = getDaysUntilExpiry(m.expiryDate); alerts.push({ type: 'expiry', name: m.name, detail: `Expires in ${days} days`, status: days < 7 ? 'critical' : 'warning', expiryStatus: getExpiryStatus(m.expiryDate) }); } });
        if (alerts.length === 0) container.innerHTML = '<div style="color:#999;text-align:center;padding:20px;">✅ All items are well-stocked and have valid expiry dates</div>';
        else container.innerHTML = alerts.slice(0, 15).map(a => `<div class="low-stock-item"><span><span class="expiry-indicator ${a.expiryStatus === 'expired' ? 'expired' : a.expiryStatus === 'good' ? 'good' : 'soon'}"></span>${a.name}<span style="color:#888;font-size:12px;margin-left:8px;">${a.detail}</span></span><span class="stock-badge ${a.status === 'critical' ? 'critical' : 'low'}">${a.type === 'stock' ? `⚠️ ${a.status === 'critical' ? 'Critical' : 'Low'}` : `⏰ ${a.status === 'critical' ? 'Urgent' : 'Soon'}`}</span></div>`).join('');
    }
    const actContainer = document.getElementById('recentActivity');
    if (actContainer) {
        const recent = activities.slice(0, 10);
        if (recent.length === 0) actContainer.innerHTML = '<div style="color:#999;text-align:center;padding:20px;">No recent activity</div>';
        else actContainer.innerHTML = recent.map(a => `<div class="activity-item"><span>${a.message}</span><span class="time">${new Date(a.time).toLocaleString()}</span></div>`).join('');
    }
}

function checkExpiryAlerts() {
    const banner = document.getElementById('expiryAlertBanner');
    if (!banner) return;
    const activeProducts = medicines.filter(m => m.status === 'active');
    const expired = activeProducts.filter(m => getExpiryStatus(m.expiryDate) === 'expired');
    const expiringSoon = activeProducts.filter(m => { const s = getExpiryStatus(m.expiryDate); return s === 'expiring-7' || s === 'expiring-30'; });
    if (expired.length === 0 && expiringSoon.length === 0) { banner.innerHTML = ''; return; }
    let html = '';
    if (expired.length > 0) html += `<div class="expiry-alert-banner danger"><span class="alert-text">❌ ${expired.length} product(s) have EXPIRED!</span><span class="alert-count">${expired.length} expired</span></div>`;
    if (expiringSoon.length > 0) html += `<div class="expiry-alert-banner"><span class="alert-text">⚠️ ${expiringSoon.length} product(s) expiring within 30 days</span><span class="alert-count warning">${expiringSoon.length} expiring</span></div>`;
    banner.innerHTML = html;
}

// === PRODUCTS (POS) ===
function renderProducts() {
    const search = document.getElementById('searchInput')?.value?.toLowerCase() || '';
    const category = document.getElementById('categoryFilter')?.value || '';
    const expiryFilter = document.getElementById('expiryFilter')?.value || '';
    const grid = document.getElementById('productGrid');
    if (!grid) return;
    const filtered = medicines.filter(m => {
        if (m.status !== 'active') return false;
        const matchName = m.name.toLowerCase().includes(search);
        const matchCategory = category === '' || m.category === category;
        const s = getExpiryStatus(m.expiryDate);
        let matchExpiry = true;
        if (expiryFilter === 'good') matchExpiry = s === 'good' || s === 'no-date';
        else if (expiryFilter === 'expiring') matchExpiry = s === 'expiring-7' || s === 'expiring-30';
        else if (expiryFilter === 'expired') matchExpiry = s === 'expired';
        return matchName && matchCategory && matchExpiry;
    });
    if (filtered.length === 0) { grid.innerHTML = `<div style="grid-column:1/-1;text-align:center;padding:30px;color:#999;">No medicines found</div>`; return; }
    grid.innerHTML = filtered.map(m => {
        const s = getExpiryStatus(m.expiryDate);
        const badge = getExpiryBadgeClass(s);
        const days = getDaysUntilExpiry(m.expiryDate);
        const text = m.expiryDate ? (s === 'expired' ? 'Expired' : s === 'good' ? '✓' : `${days}d left`) : '📅';
        return `<div class="product-card" title="${m.category}"><span class="category-badge">${m.category}</span>${m.expiryDate ? `<span class="expiry-badge ${badge}">${text}</span>` : ''}<div><div class="name">${m.name}</div><div class="brand">${m.brand ? `Brand: ${m.brand}` : 'Brand: N/A'}</div><div class="price">₱${m.price.toFixed(2)}</div><div class="stock ${m.stock < 20 ? 'low' : ''}">Stock: ${m.stock}</div>${m.expiryDate && s !== 'good' ? `<div style="font-size:10px;color:${getExpiryColor(s)};font-weight:600;">${getExpiryLabel(s)}</div>` : ''}</div><button class="add-to-cart-btn" onclick="addToCart(${m.id}); event.stopPropagation();">➕ Add to Cart</button></div>`;
    }).join('');
}

function filterProducts() { renderProducts(); }

// === CART ===
function addToCart(id) {
    const med = medicines.find(m => m.id === id);
    if (!med || med.status !== 'active') return;
    if (isExpired(med.expiryDate)) { showToast('❌ This product is EXPIRED!', 'error'); return; }
    const existing = cart.find(item => item.id === id);
    const currentQty = existing ? existing.qty : 0;
    if (currentQty >= med.stock) { showToast('⚠️ Not enough stock!', 'warning'); return; }
    if (existing) existing.qty++; else cart.push({ id: med.id, name: med.name, price: med.price, qty: 1, expiryDate: med.expiryDate });
    updateCartUI();
    showToast(`✅ Added ${med.name}`, 'success');
    addActivity(`Added ${med.name} to cart`);
}

function refreshHeldCartSelect() {
    const select = document.getElementById('heldCartSelect');
    if (!select) return;
    const currentValue = select.value;
    select.innerHTML = '<option value="">Select held cart</option>' + heldCarts.map(cartItem => `
        <option value="${cartItem.id}">Held Cart #${cartItem.id} - ${cartItem.items.length} item(s) - ${new Date(cartItem.date).toLocaleString()}</option>`).join('');
    if (heldCarts.some(c => c.id.toString() === currentValue)) {
        select.value = currentValue;
    }
}

function loadHeldCart() {
    const selected = document.getElementById('heldCartSelect')?.value;
    if (!selected) { showToast('⚠️ Please select a held cart first', 'warning'); return; }
    const heldCart = heldCarts.find(c => c.id.toString() === selected);
    if (!heldCart) { showToast('❌ Held cart not found', 'error'); return; }
    // Restore the held cart into current cart
    cart = heldCart.items.map(item => ({ ...item }));
    discount = heldCart.discount || 0;
    if (document.getElementById('seniorDiscountCheckbox')) document.getElementById('seniorDiscountCheckbox').checked = !!heldCart.seniorDiscount;
    if (document.getElementById('seniorDiscountId')) document.getElementById('seniorDiscountId').value = heldCart.seniorId || '';
    if (document.getElementById('seniorIdRow')) {
        document.getElementById('seniorIdRow').classList.toggle('hidden', !document.getElementById('seniorDiscountCheckbox')?.checked);
    }
    document.getElementById('paymentAmount').value = (heldCart.paymentAmount || 0).toFixed(2);
    updateCartUI();
    showToast(`✅ Loaded held cart #${heldCart.id}`, 'success');
    addActivity(`Loaded held cart #${heldCart.id}`);
}

function updateCartQty(id, value) {
    const qty = parseInt(value, 10);
    if (isNaN(qty) || qty < 1) return;
    const item = cart.find(i => i.id === id);
    const med = medicines.find(m => m.id === id);
    if (!item || !med) return;
    if (qty > med.stock) { showToast('⚠️ Not enough stock!', 'warning'); return; }
    item.qty = qty;
    updateCartUI();
}

function toggleSeniorDiscount() {
    const checkbox = document.getElementById('seniorDiscountCheckbox');
    const row = document.getElementById('seniorIdRow');
    if (row) row.classList.toggle('hidden', !checkbox?.checked);
    updateCartUI();
}

function removeFromCart(id) {
    const idx = cart.findIndex(item => item.id === id);
    if (idx > -1) { if (cart[idx].qty > 1) cart[idx].qty--; else cart.splice(idx, 1); updateCartUI(); }
}

function deleteItem(id) {
    const item = cart.find(i => i.id === id);
    cart = cart.filter(item => item.id !== id);
    updateCartUI();
    if (item) showToast(`🗑️ Removed ${item.name}`, 'error');
}

function clearCart() {
    if (cart.length === 0) return;
    if (confirm('Clear all items?')) {
        cart = [];
        discount = 0;
        const paymentInput = document.getElementById('paymentAmount');
        if (paymentInput) paymentInput.value = '0.00';
        const seniorCheckbox = document.getElementById('seniorDiscountCheckbox');
        if (seniorCheckbox) seniorCheckbox.checked = false;
        const seniorIdInput = document.getElementById('seniorDiscountId');
        if (seniorIdInput) seniorIdInput.value = '';
        const seniorRow = document.getElementById('seniorIdRow');
        if (seniorRow) seniorRow.classList.add('hidden');
        updateCartUI();
        showToast('Cart cleared', 'warning');
        addActivity('Cleared cart');
    }
}

function holdCart() {
    if (cart.length === 0) { showToast('❌ Cart is empty!', 'error'); return; }
    const seniorChecked = document.getElementById('seniorDiscountCheckbox')?.checked;
    const seniorId = document.getElementById('seniorDiscountId')?.value.trim();
    const seniorDiscount = seniorChecked && isValidSeniorId(seniorId) ? 20 : 0;
    const paymentAmount = parseFloat(document.getElementById('paymentAmount')?.value) || 0;
    const holdId = heldCarts.length + 1;
    heldCarts.push({ id: holdId, items: [...cart], discount, seniorDiscount, seniorId, paymentAmount, date: new Date().toISOString() });
    refreshHeldCartSelect();
    cart = []; discount = 0;
    if (document.getElementById('seniorDiscountCheckbox')) document.getElementById('seniorDiscountCheckbox').checked = false;
    if (document.getElementById('seniorDiscountId')) document.getElementById('seniorDiscountId').value = '';
    if (document.getElementById('seniorIdRow')) document.getElementById('seniorIdRow').classList.add('hidden');
    document.getElementById('paymentAmount').value = '0.00'; updateCartUI(); showToast(`⏸️ Cart held (ID: ${holdId})`, 'info'); addActivity(`Held cart #${holdId}`);
}

function applyDiscount() {
    const input = prompt('Enter discount percentage (0-100):', '10');
    if (input === null) return;
    const val = parseFloat(input);
    if (isNaN(val) || val < 0 || val > 100) { showToast('❌ Invalid discount', 'error'); return; }
    discount = val;
    updateCartUI();
    showToast(`🎯 Discount: ${discount}%`, 'success');
}

function isValidSeniorId(id) {
    return /^[0-9]{6}-[0-9]{4}$/.test(id);
}

function formatSeniorIdInput() {
    const input = document.getElementById('seniorDiscountId');
    if (!input) return;
    const digits = input.value.replace(/\D/g, '').slice(0, 10);
    input.value = digits.length > 6 ? `${digits.slice(0, 6)}-${digits.slice(6)}` : digits;
    updateCartUI();
}

function updateCartUI() {
    const container = document.getElementById('cartItems');
    if (!container) return;
    if (cart.length === 0) { container.innerHTML = `<div class="empty-cart"><div class="icon">📦</div><p>No items in cart</p><small>Click on a medicine to add</small></div>`; }
    else {
        container.innerHTML = cart.map(item => {
            const s = getExpiryStatus(item.expiryDate);
            return `<div class="cart-item ${isExpired(item.expiryDate) ? 'expired' : ''}"><div class="item-info"><div class="item-name">${item.name}</div><div class="item-meta">₱${item.price.toFixed(2)} each ${item.expiryDate ? `• ${getExpiryLabel(s)}` : ''}</div></div><div class="item-qty"><input type="number" min="1" value="${item.qty}" onchange="updateCartQty(${item.id}, this.value)"></div><div class="item-total">₱${(item.price * item.qty).toFixed(2)}</div><button class="remove-btn" onclick="deleteItem(${item.id})">✕</button></div>`;
        }).join('');
    }
    const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
    const seniorChecked = document.getElementById('seniorDiscountCheckbox')?.checked;
    const seniorId = document.getElementById('seniorDiscountId')?.value.trim();
    const seniorDiscount = seniorChecked && isValidSeniorId(seniorId) ? 20 : 0;
    const paymentAmount = parseFloat(document.getElementById('paymentAmount')?.value) || 0;
    const discountAmount = (subtotal * discount) / 100;
    const seniorDiscountAmount = (subtotal * seniorDiscount) / 100;
    const totalDiscountAmount = discountAmount + seniorDiscountAmount;
    const total = subtotal - totalDiscountAmount;
    const changeDue = paymentAmount - total;
    refreshHeldCartSelect();
    const setText = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
    setText('subtotal', `₱${subtotal.toFixed(2)}`);
    setText('discountDisplay', totalDiscountAmount > 0 ? `-₱${totalDiscountAmount.toFixed(2)}` : `₱0.00`);
    setText('total', `₱${total.toFixed(2)}`);
    setText('changeDue', `₱${changeDue.toFixed(2)}`);
    const statusEl = document.getElementById('seniorDiscountStatus');
    if (statusEl) {
        if (seniorChecked && isValidSeniorId(seniorId)) {
            statusEl.textContent = `20% Senior Discount Applied`;
        } else if (seniorChecked && seniorId) {
            statusEl.textContent = `Invalid Senior Citizen ID. Use 123456-7686 format`;
        } else if (seniorChecked) {
            statusEl.textContent = `Enter Senior Citizen ID (123456-7686) to apply 20% discount`;
        } else {
            statusEl.textContent = '';
        }
    }
    document.getElementById('itemCount').textContent = `${cart.reduce((s, i) => s + i.qty, 0)} items`;
}

function getPaymentAmount() {
    const raw = document.getElementById('paymentAmount')?.value;
    if (!raw || raw === '.') return 0;
    const parsed = parseFloat(raw.toString().replace(/,/g, ''));
    if (!Number.isFinite(parsed)) return 0;
    return Math.min(Math.max(parsed, 0), 1000000);
}

function handlePaymentAmountInput() {
    const input = document.getElementById('paymentAmount');
    if (!input) return;
    let raw = input.value.toString();
    if (raw === '') { updateCartUI(); return; }

    // Allow only digits and a single decimal point
    raw = raw.replace(/[^0-9.]/g, '');
    const parts = raw.split('.');
    if (parts.length > 2) {
        raw = parts[0] + '.' + parts.slice(1).join('');
    }
    if (raw === '.') raw = '';

    if (raw !== input.value) {
        input.value = raw;
    }

    const value = getPaymentAmount();
    if (value >= 1000000) {
        input.value = '1000000.00';
    }
    updateCartUI();
}

function formatPaymentAmount() {
    const input = document.getElementById('paymentAmount');
    if (!input) return;
    const value = getPaymentAmount();
    input.value = value.toFixed(2);
    updateCartUI();
}

// === CHECKOUT ===
function checkout() {
    if (cart.length === 0) { showToast('❌ Cart is empty!', 'error'); return; }
    const expiredItems = cart.filter(item => isExpired(item.expiryDate));
    if (expiredItems.length > 0) { showToast(`❌ ${expiredItems.length} item(s) are expired!`, 'error'); return; }
    const seniorChecked = document.getElementById('seniorDiscountCheckbox')?.checked;
    const seniorId = document.getElementById('seniorDiscountId')?.value.trim();
    const seniorDiscount = seniorChecked && isValidSeniorId(seniorId) ? 20 : 0;
    const paymentAmount = parseFloat(document.getElementById('paymentAmount')?.value) || 0;
    const subtotal = cart.reduce((s, i) => s + (i.price * i.qty), 0);
    const discountAmount = (subtotal * discount) / 100;
    const seniorDiscountAmount = (subtotal * seniorDiscount) / 100;
    const totalDiscountAmount = discountAmount + seniorDiscountAmount;
    const total = subtotal - totalDiscountAmount;
    if (paymentAmount < total) { showToast('❌ Insufficient payment amount', 'error'); return; }
    const receipt = { orderId: nextOrderId, date: new Date().toISOString(), items: [...cart], subtotal, discount, seniorDiscount, seniorId, discountAmount: totalDiscountAmount, total, paymentAmount, changeDue: paymentAmount - total, cashier: currentUser.fullname, userId: currentUser.id };
    receipts.push(receipt);
    nextOrderId++;
    cart.forEach(item => { const med = medicines.find(m => m.id === item.id); if (med) med.stock -= item.qty; });
    addActivity(`Sale #${receipt.orderId} - ₱${total.toFixed(2)} (${cart.reduce((s,i) => s + i.qty, 0)} items)`);
    showReceipt(receipt);
    cart = []; discount = 0;
    if (document.getElementById('seniorDiscountCheckbox')) document.getElementById('seniorDiscountCheckbox').checked = false;
    if (document.getElementById('seniorDiscountId')) document.getElementById('seniorDiscountId').value = '';
    if (document.getElementById('seniorIdRow')) document.getElementById('seniorIdRow').classList.add('hidden');
    document.getElementById('paymentAmount').value = '0.00'; updateCartUI(); renderProducts(); updateDashboard(); checkExpiryAlerts(); saveToStorage();
    showToast('✅ Checkout successful!', 'success');
}

function showReceipt(receipt) {
    const dateString = new Date(receipt.date).toLocaleString();
    const seniorDiscountAmount = receipt.seniorDiscount ? (receipt.subtotal * receipt.seniorDiscount) / 100 : 0;
    const discountAmount = receipt.discount > 0 ? (receipt.subtotal * receipt.discount) / 100 : 0;
    const vatAmount = receipt.total * 0.12;
    const summaryRows = [];

    summaryRows.push(`<div class="line-row"><span>Subtotal:</span><span>₱${receipt.subtotal.toFixed(2)}</span></div>`);
    if (receipt.discount > 0) {
        summaryRows.push(`<div class="line-row"><span>Discount (${receipt.discount}%):</span><span>-₱${discountAmount.toFixed(2)}</span></div>`);
    }
    if (receipt.seniorDiscount > 0) {
        summaryRows.push(`<div class="line-row"><span>Senior Discount:</span><span>-₱${seniorDiscountAmount.toFixed(2)} (${receipt.seniorDiscount}%)</span></div>`);
    }
    summaryRows.push(`<div class="line-row"><span>VAT (12%):</span><span>₱${vatAmount.toFixed(2)}</span></div>`);
    summaryRows.push(`<div class="line-row grand-total"><span>Grand Total:</span><span>₱${receipt.total.toFixed(2)}</span></div>`);
    summaryRows.push(`<div class="line-row"><span>Cash Received:</span><span>₱${receipt.paymentAmount.toFixed(2)}</span></div>`);
    summaryRows.push(`<div class="line-row"><span>Change Back:</span><span>₱${receipt.changeDue.toFixed(2)}</span></div>`);

    const itemsHtml = receipt.items.map(item => {
        return `<div class="item-row"><div>
                    <div class="item-name">${item.name}</div>
                    <div class="item-meta">${item.qty}× ₱${item.price.toFixed(2)}</div>
                </div>
                <div class="item-total">₱${(item.price * item.qty).toFixed(2)}</div></div>`;
    }).join('');

    const seniorInfo = receipt.seniorId ? `<div><strong>Senior ID:</strong> OSCA-${receipt.seniorId}</div>` : '';
    const content = `
        <div class="receipt-card">
            <div class="receipt-header">
                <h1>Compound V Drugstore</h1>
                <p>Tanza Cavite, Philippines</p>
                <p class="receipt-subtitle">Official Transaction Receipt</p>
            </div>
            <div class="receipt-meta">
                <div><strong>Invoice ID:</strong> No. ${receipt.orderId}</div>
                <div><strong>Date:</strong> ${dateString}</div>
                ${seniorInfo}
            </div>
            <div class="receipt-items-header"><span>Description</span><span>Total</span></div>
            <div class="receipt-items">${itemsHtml}</div>
            <div class="receipt-summary">${summaryRows.join('')}</div>
            <div class="receipt-footer">Thank you for choosing Compound V!</div>
        </div>
    `;

    const el = document.getElementById('receiptContent');
    if (el) {
        el.innerHTML = content;
        openModal('receiptModal');
    }
}

function printReceipt() {
    const content = document.getElementById('receiptContent')?.innerHTML;
    if (!content) return;
    const win = window.open('', '_blank');
    win.document.write(`<html><head><title>Receipt</title><style>
        body{font-family:Inter, system-ui, sans-serif; padding:30px; background:#f3f6fb; color:#243240;}
        .receipt-card{max-width:520px;margin:0 auto;background:#fff;padding:28px 30px;border-radius:26px;box-shadow:0 22px 80px rgba(15,23,42,.12);}
        .receipt-header{text-align:center;margin-bottom:24px;}
        .receipt-header h1{margin:0;font-size:24px;letter-spacing:.6px;color:#12263f;}
        .receipt-header p{margin:4px 0;color:#6b7a99;font-size:13px;}
        .receipt-subtitle{font-weight:700;color:#0d6efd;}
        .receipt-meta{display:flex;justify-content:space-between;gap:12px;font-size:13px;color:#4b5a77;margin-bottom:22px;}
        .receipt-items-header{display:grid;grid-template-columns:1fr auto;gap:10px;font-size:13px;font-weight:700;color:#172b4d;border-bottom:1px solid #e9edf5;padding-bottom:8px;margin-bottom:12px;}
        .receipt-items{display:flex;flex-direction:column;gap:12px;margin-bottom:22px;}
        .item-row{display:grid;grid-template-columns:1fr auto;gap:14px;}
        .item-name{font-weight:700;color:#12263f;}
        .item-meta{font-size:12px;color:#6b7a99;margin-top:4px;}
        .item-total{font-weight:700;color:#0d6efd;text-align:right;}
        .receipt-summary{display:flex;flex-direction:column;gap:10px;border-top:1px solid #e9edf5;padding-top:14px;}
        .line-row{display:grid;grid-template-columns:1fr auto;gap:12px;font-size:14px;color:#26374d;}
        .grand-total{font-size:16px;font-weight:700;color:#12263f;}
        .receipt-footer{text-align:center;margin-top:20px;color:#5d6f85;font-size:13px;}
        @media print{body{padding:0;background:#fff;} .receipt-card{box-shadow:none;margin:0;border-radius:0;}}
    </style></head><body>${content}</body></html>`);
    win.document.close();
    win.focus();
    win.print();
}

// === PRODUCT TABLE ===
function renderProductTable() {
    const tbody = document.getElementById('productTableBody');
    if (!tbody) return;
    const active = medicines.filter(m => m.status === 'active');
    if (active.length === 0) { tbody.innerHTML = `<tr><td colspan="9" style="text-align:center;padding:30px;color:#999;">No products found</td></tr>`; return; }
    tbody.innerHTML = active.map(m => {
        const s = getExpiryStatus(m.expiryDate);
        const color = getExpiryColor(s);
        const days = getDaysUntilExpiry(m.expiryDate);
        const expiryDisplay = m.expiryDate ? `${m.expiryDate}${s !== 'good' && s !== 'no-date' ? ` (${days}d)` : ''}` : 'No expiry';
        const statusClass = s === 'expired' ? 'expired' : (s === 'expiring-7' || s === 'expiring-30') ? 'expiring' : 'active';
        const statusLabel = s === 'expired' ? '⚠️ Expired' : (s === 'expiring-7' || s === 'expiring-30') ? '⏰ Expiring' : '✅ Active';
        const canEdit = canManageProducts();
        return `<tr><td>${m.id}</td><td>${m.name}</td><td>${m.brand || ''}</td><td>${m.category}</td><td>₱${m.price.toFixed(2)}</td><td><span style="color:${m.stock < 20 ? 'var(--danger)' : 'inherit'}">${m.stock}</span></td><td style="color:${color};font-weight:${s === 'expired' ? '700' : 'normal'};">${expiryDisplay}</td><td><span class="status-badge ${statusClass}">${statusLabel}</span></td><td><div class="table-actions">${canEdit ? `<button class="edit-btn" onclick="editProduct(${m.id})">✏️ Edit</button><button class="archive-btn" onclick="archiveProduct(${m.id})">📦 Archive</button>` : '<span style="color:#888;font-size:11px;">View only</span>'}</div></td></tr>`;
    }).join('');
}

function getTodayDateString() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

function showAddProductModal() {
    if (!canManageProducts()) { showToast('❌ You don\'t have permission to add products', 'error'); return; }
    const expiryInput = document.getElementById('prodExpiry');
    expiryInput.min = getTodayDateString();
    expiryInput.value = '';
    document.getElementById('productModalTitle').textContent = 'Add Product';
    document.getElementById('editProductId').value = '';
    document.getElementById('prodName').value = '';
    document.getElementById('prodBrand').value = '';
    document.getElementById('prodCategory').value = 'Tablet';
    document.getElementById('prodPrice').value = '';
    document.getElementById('prodStock').value = '';
    openModal('productModal');
}

function editProduct(id) {
    if (!canManageProducts()) { showToast('❌ You don\'t have permission to edit products', 'error'); return; }
    const p = medicines.find(m => m.id === id);
    if (!p) return;
    const expiryInput = document.getElementById('prodExpiry');
    expiryInput.min = getTodayDateString();
    document.getElementById('productModalTitle').textContent = 'Edit Product';
    document.getElementById('editProductId').value = id;
    document.getElementById('prodName').value = p.name;
    document.getElementById('prodBrand').value = p.brand || '';
    document.getElementById('prodCategory').value = p.category;
    document.getElementById('prodPrice').value = p.price;
    document.getElementById('prodStock').value = p.stock;
    document.getElementById('prodExpiry').value = p.expiryDate || '';
    openModal('productModal');
}

function saveProduct() {
    const id = document.getElementById('editProductId').value;
    const name = document.getElementById('prodName').value.trim();
    const brand = document.getElementById('prodBrand').value.trim();
    const category = document.getElementById('prodCategory').value;
    const price = parseFloat(document.getElementById('prodPrice').value);
    const stock = parseInt(document.getElementById('prodStock').value);
    const expiryDate = document.getElementById('prodExpiry').value;
    const today = getTodayDateString();
    if (!name || !brand || isNaN(price) || price < 0 || isNaN(stock) || stock < 0) { showToast('❌ Please fill all required fields', 'error'); return; }
    if (expiryDate && expiryDate < today) { showToast('❌ Expiry date cannot be in the past', 'error'); return; }
    if (id) {
        const p = medicines.find(m => m.id === parseInt(id));
        if (p) { p.name = name; p.brand = brand; p.category = category; p.price = price; p.stock = stock; p.expiryDate = expiryDate || null; showToast('✅ Product updated!', 'success'); addActivity(`Updated product: ${name}`); }
    } else {
        medicines.push({ id: productIdCounter++, name, brand, category, price, stock, expiryDate: expiryDate || null, status: 'active' });
        showToast('✅ Product added!', 'success'); addActivity(`Added product: ${name}`);
    }
    closeModal('productModal');
    renderProductTable(); renderProducts(); updateDashboard(); checkExpiryAlerts(); saveToStorage();
}

function archiveProduct(id) {
    if (!canManageProducts()) { showToast('❌ You don\'t have permission to archive products', 'error'); return; }
    if (!confirm('Archive this product?')) return;
    const p = medicines.find(m => m.id === id);
    if (p) { p.status = 'archived'; archives.push({ type: 'product', id: p.id, name: p.name, details: `${p.category} - ₱${p.price.toFixed(2)}${p.expiryDate ? ` (Exp: ${p.expiryDate})` : ''}`, archivedDate: new Date().toISOString() }); showToast('📦 Product archived', 'warning'); addActivity(`Archived product: ${p.name}`); renderProductTable(); renderProducts(); updateDashboard(); checkExpiryAlerts(); saveToStorage(); }
}

function deleteProduct(id) {
    if (!canManageProducts()) { showToast('❌ You don\'t have permission to delete products', 'error'); return; }
    if (!confirm('Permanently delete this product?')) return;
    const p = medicines.find(m => m.id === id);
    medicines = medicines.filter(m => m.id !== id);
    showToast('🗑️ Product deleted', 'error');
    if (p) addActivity(`Deleted product: ${p.name}`);
    renderProductTable(); renderProducts(); updateDashboard(); saveToStorage();
}

// === USER TABLE ===
function renderUserTable() {
    const tbody = document.getElementById('userTableBody');
    if (!tbody) return;
    const active = users.filter(u => u.status === 'active');
    if (active.length === 0) { tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:30px;color:#999;">No users found</td></tr>`; return; }
    const canManage = canManageUsers();
    tbody.innerHTML = active.map(u => `<tr><td>${u.id}</td><td>${u.username}</td><td>${u.fullname}</td><td><span class="status-badge active">${u.role}</span></td><td>${formatTimestamp(u.lastLogin)}</td><td>${formatTimestamp(u.lastLogout)}</td><td><span class="status-badge active">Active</span></td><td><div class="table-actions">${canManage ? `<button class="edit-btn" onclick="editUser(${u.id})">✏️ Edit</button><button class="archive-btn" onclick="archiveUser(${u.id})">📦 Archive</button>` : '<span style="color:#888;font-size:11px;">View only</span>'}</div></td></tr>`).join('');
}

function renderPendingUsers() {
    const tbody = document.getElementById('pendingUserTableBody');
    const section = document.getElementById('pendingUsersSection');
    if (!tbody || !section) return;
    const pending = pendingUsers.filter(u => u.status === 'pending');
    if (pending.length === 0) { section.style.display = 'none'; return; }
    section.style.display = 'block';
    const canManage = canManageUsers();
    tbody.innerHTML = pending.map(u => `<tr><td>${u.id}</td><td>${u.username}</td><td>${u.fullname}</td><td><span class="status-badge pending">${u.role}</span></td><td>${new Date(u.requestedDate).toLocaleString()}</td><td><div class="table-actions">${canManage ? `<button class="approve-btn" onclick="approveUser(${u.id})">✅ Approve</button><button class="reject-btn" onclick="rejectUser(${u.id})">❌ Reject</button>` : '<span style="color:#888;font-size:11px;">Pending</span>'}</div></td></tr>`).join('');
}

function approveUser(id) {
    if (!canManageUsers()) { showToast('❌ You don\'t have permission to approve users', 'error'); return; }
    if (!confirm('Approve this user?')) return;
    const pu = pendingUsers.find(u => u.id === id);
    if (!pu) return;
    const pendingUsernameLower = pu.username.toLowerCase();
    if (pendingUsernameLower === 'superadmin') { showToast('❌ Cannot approve Superadmin username', 'error'); return; }
    if (users.some(u => u.username.toLowerCase() === pendingUsernameLower)) { showToast('❌ Username already exists', 'error'); return; }
    if (pu.role === 'Superadmin' && users.some(u => u.role === 'Superadmin' && u.status === 'active')) { showToast('❌ Only one Superadmin account is allowed', 'error'); return; }
    users.push({ id: userIdCounter++, username: pu.username, fullname: pu.fullname, password: pu.password, role: pu.role, status: 'active' });
    pu.status = 'approved';
    pendingUsers = pendingUsers.filter(u => u.id !== id);
    showToast('✅ User approved!', 'success');
    addActivity(`Approved user: ${pu.username}`);
    renderPendingUsers(); renderUserTable(); updateDashboard(); updateBadges(); saveToStorage();
}

function rejectUser(id) {
    if (!canManageUsers()) { showToast('❌ You don\'t have permission to reject users', 'error'); return; }
    if (!confirm('Reject this user?')) return;
    const pu = pendingUsers.find(u => u.id === id);
    if (!pu) return;
    pu.status = 'rejected';
    pendingUsers = pendingUsers.filter(u => u.id !== id);
    showToast('❌ User rejected', 'error');
    addActivity(`Rejected user: ${pu.username}`);
    renderPendingUsers(); updateDashboard(); updateBadges(); saveToStorage();
}

function showAddUserModal() {
    if (!canManageUsers()) { showToast('❌ You don\'t have permission to add users', 'error'); return; }
    document.getElementById('userModalTitle').textContent = 'Add User';
    document.getElementById('editUserId').value = '';
    document.getElementById('userUsername').value = '';
    document.getElementById('userFullname').value = '';
    document.getElementById('userPassword').value = '';
    document.getElementById('userRole').value = 'Staff';
    openModal('userModal');
}

function editUser(id) {
    if (!canManageUsers()) { showToast('❌ You don\'t have permission to edit users', 'error'); return; }
    const u = users.find(u => u.id === id);
    if (!u) return;
    document.getElementById('userModalTitle').textContent = 'Edit User';
    document.getElementById('editUserId').value = id;
    document.getElementById('userUsername').value = u.username;
    document.getElementById('userFullname').value = u.fullname;
    document.getElementById('userPassword').value = '';
    document.getElementById('userRole').value = u.role;
    openModal('userModal');
}

function saveUser() {
    const id = document.getElementById('editUserId').value;
    const username = document.getElementById('userUsername').value.trim();
    const fullname = document.getElementById('userFullname').value.trim();
    const password = document.getElementById('userPassword').value;
    const role = document.getElementById('userRole').value;
    const usernameLower = username.toLowerCase();
    if (!username || !fullname) { showToast('❌ Please fill all fields', 'error'); return; }
    if (usernameLower === 'superadmin' && users.some(u => u.username.toLowerCase() === 'superadmin' && (!id || u.id !== parseInt(id)))) {
        showToast('❌ Superadmin account already exists', 'error');
        return;
    }
    if (users.some(u => u.username.toLowerCase() === usernameLower && (!id || u.id !== parseInt(id)))) {
        showToast('❌ Username already exists', 'error');
        return;
    }
    if (role === 'Superadmin' && users.some(u => u.role === 'Superadmin' && (!id || u.id !== parseInt(id)))) {
        showToast('❌ Only one Superadmin account is allowed', 'error');
        return;
    }
    if (id) {
        const u = users.find(u => u.id === parseInt(id));
        if (u) { u.username = username; u.fullname = fullname; if (password) u.password = password; u.role = role; showToast('✅ User updated!', 'success'); addActivity(`Updated user: ${username}`); }
    } else {
        if (!password) { showToast('❌ Password is required', 'error'); return; }
        const { isValid } = validatePassword(password);
        if (!isValid) { showToast('❌ Password must be 8+ chars with upper, lower, number, symbol', 'error'); return; }
        users.push({ id: userIdCounter++, username, fullname, password, role, status: 'active' });
        showToast('✅ User added!', 'success'); addActivity(`Added user: ${username}`);
    }
    closeModal('userModal');
    renderUserTable(); updateDashboard(); saveToStorage();
}

function archiveUser(id) {
    if (!canManageUsers()) { showToast('❌ You don\'t have permission to archive users', 'error'); return; }
    const user = users.find(u => u.id === id);
    if (user && user.username.toLowerCase() === 'superadmin') { showToast('❌ Cannot archive Superadmin', 'error'); return; }
    if (id === 1) { showToast('❌ Cannot archive admin', 'error'); return; }
    if (!confirm('Archive this user?')) return;
    if (user) { user.status = 'archived'; archives.push({ type: 'user', id: user.id, name: user.username, details: `${user.fullname} - ${user.role}`, archivedDate: new Date().toISOString() }); showToast('📦 User archived', 'warning'); addActivity(`Archived user: ${user.username}`); renderUserTable(); updateDashboard(); saveToStorage(); }
}

function deleteUser(id) {
    if (!canManageUsers()) { showToast('❌ You don\'t have permission to delete users', 'error'); return; }
    const user = users.find(u => u.id === id);
    if (user && user.username.toLowerCase() === 'superadmin') { showToast('❌ Cannot delete Superadmin', 'error'); return; }
    if (id === 1) { showToast('❌ Cannot delete admin', 'error'); return; }
    if (!confirm('Permanently delete this user?')) return;
    users = users.filter(u => u.id !== id);
    showToast('🗑️ User deleted', 'error');
    if (user) addActivity(`Deleted user: ${user.username}`);
    renderUserTable(); updateDashboard(); saveToStorage();
}

// === ACCOUNT REGISTRATION ===
function showRegistrationModal() {
    document.getElementById('regUsername').value = '';
    document.getElementById('regFullname').value = '';
    document.getElementById('regEmail').value = '';
    document.getElementById('regPassword').value = '';
    document.getElementById('regConfirmPassword').value = '';
    document.getElementById('regRole').value = 'Staff';
    document.getElementById('regNotes').value = '';
    document.querySelectorAll('#regPasswordStrength .bar').forEach(b => b.className = 'bar');
    document.querySelectorAll('#regPasswordRequirements .req').forEach(el => { el.className = 'req invalid'; el.querySelector('.icon').textContent = '❌'; });
    openModal('registrationModal');
}

function checkRegistrationPassword() {
    const password = document.getElementById('regPassword').value;
    if (!password) { document.querySelectorAll('#regPasswordStrength .bar').forEach(b => b.className = 'bar'); return; }
    const { requirements } = validatePassword(password);
    const strength = getPasswordStrength(password);
    const bars = document.querySelectorAll('#regPasswordStrength .bar');
    const score = Object.values(requirements).filter(Boolean).length;
    bars.forEach((bar, i) => { bar.className = 'bar'; if (i < score) bar.classList.add(strength.class); });
    ['reqLength', 'reqLower', 'reqUpper', 'reqNumber', 'reqSymbol'].forEach(key => {
        const el = document.getElementById(key);
        if (el) {
            const valid = requirements[key.replace('req', '').toLowerCase()] || (key === 'reqLength' ? requirements.minLength : false);
            el.className = `req ${valid ? 'valid' : 'invalid'}`;
            el.querySelector('.icon').textContent = valid ? '✅' : '❌';
        }
    });
}

function submitRegistration() {
    const username = document.getElementById('regUsername').value.trim();
    const fullname = document.getElementById('regFullname').value.trim();
    const email = document.getElementById('regEmail').value.trim();
    const password = document.getElementById('regPassword').value;
    const confirm = document.getElementById('regConfirmPassword').value;
    const role = document.getElementById('regRole').value;
    const notes = document.getElementById('regNotes').value.trim();
    if (!username || !fullname || !email || !password) { showToast('❌ Please fill all required fields', 'error'); return; }
    if (username.toLowerCase() === 'superadmin') { showToast('❌ Cannot register Superadmin user', 'error'); return; }
    if (role === 'Superadmin') { showToast('❌ Superadmin account cannot be created via registration', 'error'); return; }
    const { isValid } = validatePassword(password);
    if (!isValid) { showToast('❌ Password must be 8+ chars with upper, lower, number, symbol', 'error'); return; }
    if (password !== confirm) { showToast('❌ Passwords do not match', 'error'); return; }
    const usernameLower = username.toLowerCase();
    if (users.some(u => u.username.toLowerCase() === usernameLower) || pendingUsers.some(u => u.username.toLowerCase() === usernameLower)) { showToast('❌ Username already exists', 'error'); return; }
    pendingUsers.push({ id: pendingUserIdCounter++, username, fullname, email, password, role, notes, requestedDate: new Date().toISOString(), status: 'pending' });
    closeModal('registrationModal');
    showToast('✅ Registration submitted! Awaiting admin approval.', 'success');
    addActivity(`Registration request: ${username}`);
    renderPendingUsers(); updateDashboard(); updateBadges(); saveToStorage();
}

// === LEAVE REQUESTS ===
function showLeaveRequestModal() {
    document.getElementById('leaveType').value = 'Sick Leave';
    document.getElementById('leaveStart').value = '';
    document.getElementById('leaveEnd').value = '';
    document.getElementById('leaveReason').value = '';
    openModal('leaveModal');
}

function submitLeaveRequest() {
    const type = document.getElementById('leaveType').value;
    const start = document.getElementById('leaveStart').value;
    const end = document.getElementById('leaveEnd').value;
    const reason = document.getElementById('leaveReason').value.trim();
    if (!start || !end || !reason) { showToast('❌ Please fill all fields', 'error'); return; }
    if (new Date(start) > new Date(end)) { showToast('❌ End date must be after start date', 'error'); return; }
    leaveRequests.push({ id: leaveIdCounter++, userId: currentUser.id, username: currentUser.username, fullname: currentUser.fullname, type, startDate: start, endDate: end, reason, status: 'pending', requestedDate: new Date().toISOString() });
    closeModal('leaveModal');
    showToast('✅ Leave request submitted!', 'success');
    addActivity(`Leave request: ${currentUser.fullname} - ${type}`);
    renderLeaveRequests(); updateDashboard(); updateBadges(); saveToStorage();
}

function renderLeaveRequests() {
    const tbody = document.getElementById('leaveTableBody');
    if (!tbody) return;
    if (leaveRequests.length === 0) { tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:30px;color:#999;">No leave requests</td></tr>`; return; }
    const sorted = [...leaveRequests].sort((a, b) => new Date(b.requestedDate) - new Date(a.requestedDate));
    const canManage = canManageHR();
    tbody.innerHTML = sorted.map(l => {
        const sc = l.status === 'approved' ? 'approved' : l.status === 'rejected' ? 'rejected' : 'pending';
        const sl = l.status === 'approved' ? '✅ Approved' : l.status === 'rejected' ? '❌ Rejected' : '⏳ Pending';
        return `<tr><td>${l.id}</td><td>${l.fullname}</td><td>${l.type}</td><td>${new Date(l.startDate).toLocaleDateString()}</td><td>${new Date(l.endDate).toLocaleDateString()}</td><td style="max-width:150px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">${l.reason}</td><td><span class="status-badge ${sc}">${sl}</span></td><td>${l.status === 'pending' && canManage ? `<div class="table-actions"><button class="approve-btn" onclick="approveLeave(${l.id})">✅ Approve</button><button class="reject-btn" onclick="rejectLeave(${l.id})">❌ Reject</button></div>` : l.status === 'pending' ? '⏳ Awaiting' : '—'}</td></tr>`;
    }).join('');
}

function approveLeave(id) {
    if (!canManageHR()) { showToast('❌ You don\'t have permission to approve leaves', 'error'); return; }
    if (!confirm('Approve this leave?')) return;
    const l = leaveRequests.find(l => l.id === id);
    if (!l) return;
    l.status = 'approved';
    showToast('✅ Leave approved!', 'success');
    addActivity(`Leave approved: ${l.fullname} - ${l.type}`);
    renderLeaveRequests(); updateDashboard(); updateBadges(); saveToStorage();
}

function rejectLeave(id) {
    if (!canManageHR()) { showToast('❌ You don\'t have permission to reject leaves', 'error'); return; }
    if (!confirm('Reject this leave?')) return;
    const l = leaveRequests.find(l => l.id === id);
    if (!l) return;
    l.status = 'rejected';
    showToast('❌ Leave rejected', 'error');
    addActivity(`Leave rejected: ${l.fullname} - ${l.type}`);
    renderLeaveRequests(); updateDashboard(); updateBadges(); saveToStorage();
}

function renderRegistrations() {
    const tbody = document.getElementById('registrationTableBody');
    if (!tbody) return;
    const pending = pendingUsers.filter(u => u.status === 'pending');
    if (pending.length === 0) { tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;padding:30px;color:#999;">No pending registrations</td></tr>`; return; }
    const canManage = canManageUsers();
    tbody.innerHTML = pending.map(u => `<tr><td>${u.id}</td><td>${u.username}</td><td>${u.fullname}</td><td><span class="status-badge pending">${u.role}</span></td><td>${new Date(u.requestedDate).toLocaleString()}</td><td><span class="status-badge pending">⏳ Pending</span></td><td><div class="table-actions">${canManage ? `<button class="approve-btn" onclick="approveUser(${u.id})">✅ Approve</button><button class="reject-btn" onclick="rejectUser(${u.id})">❌ Reject</button>` : '<span style="color:#888;font-size:11px;">Pending</span>'}</div></td></tr>`).join('');
}

// === RECEIPTS ===
function renderReceiptTable(filterDate = '') {
    const tbody = document.getElementById('receiptTableBody');
    if (!tbody) return;
    let filtered = [...receipts];
    if (filterDate) filtered = filtered.filter(r => new Date(r.date).toDateString() === new Date(filterDate).toDateString());
    filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
    if (filtered.length === 0) { tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;padding:30px;color:#999;">No receipts found</td></tr>`; return; }
    tbody.innerHTML = filtered.map(r => `<tr><td><strong>#${r.orderId}</strong></td><td>${new Date(r.date).toLocaleString()}</td><td>${r.items.reduce((s, i) => s + i.qty, 0)} items</td><td>₱${r.subtotal.toFixed(2)}</td><td>${r.seniorId ? `OSCA-${r.seniorId}` : 'None'}</td><td><strong>₱${r.total.toFixed(2)}</strong></td><td><div class="table-actions"><button class="edit-btn" onclick="viewReceipt(${r.orderId})">👁️ View</button><button class="btn-print" onclick="printReceiptFromHistory(${r.orderId})">🖨️ Print</button></div></td></tr>`).join('');
}

function filterReceipts() { const date = document.getElementById('receiptDateFilter')?.value || ''; renderReceiptTable(date); }
function clearReceiptFilter() { const el = document.getElementById('receiptDateFilter'); if (el) el.value = ''; renderReceiptTable(); }
function viewReceipt(orderId) { const r = receipts.find(r => r.orderId === orderId); if (!r) { showToast('❌ Receipt not found', 'error'); return; } showReceipt(r); }

function printReceiptFromHistory(orderId) {
    const receipt = receipts.find(r => r.orderId === orderId);
    if (!receipt) { showToast('❌ Receipt not found', 'error'); return; }
    showReceipt(receipt);
    printReceipt();
}

// Receipt archiving is removed from history actions.
// Receipt records remain in place for printing and viewing only.

// === ARCHIVES ===
function renderArchives() {
    const tbody = document.getElementById('archiveTableBody');
    if (!tbody) return;
    const filter = document.getElementById('archiveTypeFilter')?.value || 'all';
    let filtered = [...archives];
    if (filter !== 'all') filtered = filtered.filter(a => a.type === filter);
    filtered.sort((a, b) => new Date(b.archivedDate) - new Date(a.archivedDate));
    if (filtered.length === 0) { tbody.innerHTML = `<tr><td colspan="4" style="text-align:center;padding:30px;color:#999;">No archives found</td></tr>`; return; }
    const icons = { product: '💊', user: '👤', receipt: '🧾', role: '🔑' };
    tbody.innerHTML = filtered.map(a => `<tr><td>${icons[a.type] || '📦'} ${a.type.charAt(0).toUpperCase() + a.type.slice(1)}</td><td>${a.name}</td><td>${new Date(a.archivedDate).toLocaleString()}</td><td><div class="table-actions">${a.type !== 'receipt' ? `<button class="edit-btn" onclick="restoreArchive('${a.type}', ${a.id})">↩️ Restore</button>` : ''}</div></td></tr>`).join('');
}

function restoreArchive(type, id) {
    const idx = archives.findIndex(a => a.type === type && a.id === id);
    if (idx === -1) { showToast('❌ Not found', 'error'); return; }
    const archive = archives[idx];
    if (type === 'product') {
        const p = medicines.find(m => m.id === id);
        if (p) { p.status = 'active'; archives.splice(idx, 1); showToast('↩️ Product restored!', 'success'); addActivity(`Restored product: ${p.name}`); }
        else { showToast('❌ Product not found', 'error'); return; }
    } else if (type === 'user') {
        const u = users.find(u => u.id === id);
        if (u) { u.status = 'active'; archives.splice(idx, 1); showToast('↩️ User restored!', 'success'); addActivity(`Restored user: ${u.username}`); }
        else { showToast('❌ User not found', 'error'); return; }
    } else if (type === 'role') {
        const archiveEntry = archives[idx];
        if (!archiveEntry) { showToast('❌ Archive not found', 'error'); return; }
        if (roles.find(r => r.name === archiveEntry.name)) { showToast('❌ Role already exists', 'error'); return; }
        roles.push({ name: archiveEntry.name, permissions: archiveEntry.details.replace('Permissions: ', '').split(', ').filter(Boolean) });
        archives.splice(idx, 1);
        showToast('↩️ Role restored!', 'success');
        addActivity(`Restored role: ${archiveEntry.name}`);
        updateRoleDropdowns();
        renderRoleTable();
    } else if (type === 'receipt') { showToast('ℹ️ Receipts cannot be restored', 'info'); return; }
    renderArchives(); renderProductTable(); renderUserTable(); updateDashboard(); saveToStorage();
}

function deleteArchive(type, id) {
    if (!confirm('Delete this archive entry?')) return;
    const idx = archives.findIndex(a => a.type === type && a.id === id);
    if (idx > -1) { const item = archives[idx]; archives.splice(idx, 1); showToast('🗑️ Deleted', 'error'); addActivity(`Deleted archive: ${item.name}`); renderArchives(); saveToStorage(); }
}

function clearAllArchives() {
    if (archives.length === 0) { showToast('📦 No archives', 'info'); return; }
    if (!confirm('Delete ALL archives?')) return;
    archives = [];
    showToast('🗑️ All archives cleared', 'error');
    addActivity('Cleared all archives');
    renderArchives(); saveToStorage();
}

function showArchiveModal(type) {
    const content = document.getElementById('archiveContent');
    if (!content) return;
    const filtered = archives.filter(a => a.type === type);
    if (filtered.length === 0) content.innerHTML = '<div style="color:#999;text-align:center;padding:20px;">No archived items found</div>';
    else content.innerHTML = filtered.map(a => `<div style="padding:10px;border-bottom:1px solid #f0f4f8;display:flex;justify-content:space-between;"><span>${a.name}</span><span style="color:#999;font-size:12px;">${new Date(a.archivedDate).toLocaleString()}</span></div>`).join('');
    openModal('archiveModal');
}

// === LOGOUT ===
function logout() {
    if (confirm('Logout?')) {
        if (currentUser) {
            currentUser.lastLogout = new Date().toISOString();
            saveToStorage();
        }
        currentUser = null;
        document.getElementById('mainApp').style.display = 'none';
        document.getElementById('loginPage').style.display = 'flex';
        document.getElementById('loginPassword').value = '';
        document.getElementById('loginUsername').value = '';
        showToast('👋 Logged out', 'info');
    }
}

// === RENDER ALL ===
function renderAll() {
    renderProducts(); updateCartUI(); renderProductTable(); renderUserTable(); renderPendingUsers(); renderReceiptTable(); renderArchives(); renderLeaveRequests(); renderRegistrations(); renderRoleTable(); updateDashboard(); checkExpiryAlerts(); updateBadges();
}

// === BOOTSTRAP ===
loadFromStorage();
if (currentUser) {
    document.getElementById('loginPage').style.display = 'none';
    document.getElementById('mainApp').style.display = 'block';
    renderMainApp();
    initApp();
} else {
    document.getElementById('loginPage').style.display = 'flex';
    document.getElementById('mainApp').style.display = 'none';
}
console.log('💊 Compound V Drugstore · database: medecine_pos');
console.log('🔐 Default: admin/Admin@123 · pharmacist/Pharma@123 · cashier/Cash@123');
console.log('🔑 Available Roles:', roles.map(r => r.name).join(', '));
</script>
</body>
</html>