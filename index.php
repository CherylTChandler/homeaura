<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomeAura — Live Beautifully</title>
  <script>var siteName='HomeAura', domainName=window.location.hostname||'homeaura.com';</script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}

    :root{
      --bg:        #f8f6f1;
      --bg2:       #eeeae0;
      --canvas:    #ffffff;
      --text:      #1e1c18;
      --text2:     #5c5848;
      --text3:     #a89e8a;
      --sage:      #6b8c6e;
      --sage-lt:   #e4ede5;
      --sage-dk:   #4a6b4d;
      --gold:      #c9a84c;
      --gold-lt:   #f5ecd2;
      --gold-dk:   #9e7a2a;
      --rust:      #c0553a;
      --border:    #ddd8cc;
      --sd1:       0 2px 16px rgba(30,28,24,.07);
      --sd2:       0 10px 40px rgba(30,28,24,.12);
      --sd3:       0 24px 72px rgba(30,28,24,.18);
      --r:         16px;
      --rs:        10px;
      --ease:      0.3s cubic-bezier(.4,0,.2,1);
    }
    [data-theme="dark"]{
      --bg:        #141210;
      --bg2:       #1c1a16;
      --canvas:    #252218;
      --text:      #f0ede4;
      --text2:     #a89e88;
      --text3:     #5a5244;
      --sage:      #8ab48e;
      --sage-lt:   #1e2e1f;
      --sage-dk:   #b0d4b4;
      --gold:      #e0bc6a;
      --gold-lt:   #2a2010;
      --gold-dk:   #f0d080;
      --rust:      #e07060;
      --border:    #36322a;
      --sd1:       0 2px 16px rgba(0,0,0,.4);
      --sd2:       0 10px 40px rgba(0,0,0,.55);
      --sd3:       0 24px 72px rgba(0,0,0,.65);
    }

    html{scroll-behavior:smooth}
    body{background:var(--bg);color:var(--text);font-family:'Outfit',sans-serif;line-height:1.6;overflow-x:hidden}
    ::-webkit-scrollbar{width:5px}
    ::-webkit-scrollbar-thumb{background:var(--border);border-radius:20px}
    .page{display:none}
    .page.active{display:block}

    /* ─── TOPBAR ─── */
    .topbar{position:fixed;top:0;left:0;right:0;z-index:1001;background:var(--sage);color:#fff;text-align:center;padding:8px 1rem;font-size:.72rem;font-weight:500;letter-spacing:.06em}
    .topbar span{color:var(--gold-lt)}

    /* ─── HEADER ─── */
    .ha-header{
      position:fixed;top:0;left:0;right:0;z-index:1000;
      background:rgba(248,246,241,.97);backdrop-filter:blur(20px);
      border-bottom:1px solid var(--border);transition:var(--ease);
    }
    [data-theme="dark"] .ha-header{background:rgba(20,18,16,.97)}
    .has-topbar .ha-header{top:36px}
    .nav-inner{max-width:1400px;margin:0 auto;padding:.9rem 2.5rem;display:flex;align-items:center;justify-content:space-between;gap:1rem}
    .logo{display:flex;align-items:center;gap:11px;text-decoration:none}
    .logo-mark{
      width:36px;height:36px;background:linear-gradient(135deg,var(--sage),var(--sage-dk));
      border-radius:10px;display:flex;align-items:center;justify-content:center;
      font-size:1rem;color:#fff;font-weight:700;font-family:'Playfair Display',serif;
      box-shadow:0 4px 12px rgba(107,140,110,.35);
    }
    .logo-text{font-family:'Playfair Display',serif;font-size:1.55rem;font-weight:600;color:var(--text);letter-spacing:-.01em}
    .logo-text em{font-style:italic;color:var(--sage);font-weight:400}
    .nav-mid{display:flex;gap:2.2rem}
    .nav-mid a{font-size:.8rem;font-weight:500;color:var(--text2);text-decoration:none;transition:.2s;letter-spacing:.02em}
    .nav-mid a:hover{color:var(--sage)}
    .nav-right{display:flex;align-items:center;gap:.9rem}
    .hbtn{background:none;border:none;cursor:pointer;color:var(--text2);font-size:.95rem;width:36px;height:36px;border-radius:9px;display:flex;align-items:center;justify-content:center;transition:var(--ease)}
    .hbtn:hover{background:var(--bg2);color:var(--sage)}
    .cart-wrap{position:relative}
    .cart-pill{
      display:flex;align-items:center;gap:7px;background:var(--sage);color:#fff;
      border:none;border-radius:50px;padding:.45rem 1rem .45rem .7rem;
      cursor:pointer;font-size:.78rem;font-weight:600;transition:var(--ease);font-family:'Outfit',sans-serif;
    }
    .cart-pill:hover{background:var(--sage-dk)}
    .cart-num{background:var(--gold);color:var(--text);font-size:.55rem;font-weight:800;width:18px;height:18px;border-radius:50%;display:flex;align-items:center;justify-content:center}

    /* ─── HERO ─── */
    .hero{
      margin-top:65px;min-height:90vh;
      display:grid;grid-template-columns:55% 45%;
      position:relative;overflow:hidden;
    }
    .has-topbar .hero{margin-top:101px}
    .hero-bg-accent{
      position:absolute;top:-120px;left:-120px;width:600px;height:600px;
      background:radial-gradient(circle,var(--sage-lt) 0%,transparent 65%);
      border-radius:50%;z-index:0;
    }
    .hero-bg-accent2{
      position:absolute;bottom:-80px;left:30%;width:400px;height:400px;
      background:radial-gradient(circle,var(--gold-lt) 0%,transparent 65%);
      border-radius:50%;z-index:0;
    }
    .hero-left{
      display:flex;flex-direction:column;justify-content:center;
      padding:5rem 4rem 5rem 6%;position:relative;z-index:1;
    }
    .eyebrow{
      display:inline-flex;align-items:center;gap:10px;
      font-size:.7rem;font-weight:600;text-transform:uppercase;letter-spacing:.14em;
      color:var(--sage);margin-bottom:1.4rem;
    }
    .eyebrow::before{content:'';width:28px;height:2px;background:var(--sage);border-radius:2px}
    .hero-h1{
      font-family:'Playfair Display',serif;
      font-size:clamp(2.8rem,5.5vw,5rem);font-weight:700;line-height:1.08;
      color:var(--text);margin-bottom:1.4rem;letter-spacing:-.02em;
    }
    .hero-h1 em{font-style:italic;color:var(--sage);font-weight:400}
    .hero-p{font-size:.95rem;color:var(--text2);max-width:440px;margin-bottom:1.8rem;font-weight:300;line-height:1.75}
    .hero-badge{
      display:inline-flex;align-items:center;gap:8px;
      background:var(--gold-lt);border:1px solid var(--gold);border-radius:8px;
      padding:.65rem 1.1rem;font-size:.8rem;color:var(--gold-dk);font-weight:500;
      margin-bottom:2rem;
    }
    .hero-ctas{display:flex;gap:.9rem;flex-wrap:wrap}
    .cta-fill{
      display:inline-flex;align-items:center;gap:8px;
      background:var(--sage);color:#fff;border:none;border-radius:50px;
      padding:.9rem 2.2rem;font-size:.88rem;font-weight:600;cursor:pointer;
      transition:var(--ease);font-family:'Outfit',sans-serif;text-decoration:none;
    }
    .cta-fill:hover{background:var(--sage-dk);transform:translateY(-2px);box-shadow:0 8px 24px rgba(107,140,110,.4)}
    .cta-outline{
      display:inline-flex;align-items:center;gap:8px;
      background:transparent;color:var(--text);border:1.5px solid var(--border);
      border-radius:50px;padding:.9rem 1.8rem;font-size:.88rem;font-weight:500;
      cursor:pointer;transition:var(--ease);font-family:'Outfit',sans-serif;
    }
    .cta-outline:hover{border-color:var(--sage);color:var(--sage)}
    .hero-stats{display:flex;gap:2.5rem;margin-top:2.5rem}
    .hero-stat .num{font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;color:var(--text)}
    .hero-stat .lbl{font-size:.7rem;color:var(--text3);text-transform:uppercase;letter-spacing:.08em;margin-top:1px}

    /* Hero right — stacked editorial images */
    .hero-right{position:relative;z-index:1;overflow:hidden}
    .hero-collage{height:90vh;display:grid;grid-template-rows:1fr 1fr;grid-template-columns:1fr 1fr;gap:10px;padding:2rem 2rem 2rem 0}
    .hc-cell{border-radius:var(--r);overflow:hidden;position:relative;cursor:pointer}
    .hc-cell img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease}
    .hc-cell:hover img{transform:scale(1.06)}
    .hc-cell:nth-child(1){grid-row:1/2;grid-column:1/2;border-radius:var(--r) var(--r) 0 var(--r)}
    .hc-cell:nth-child(2){grid-row:1/2;grid-column:2/3;margin-top:28px;border-radius:0 var(--r) var(--r) 0}
    .hc-cell:nth-child(3){grid-row:2/3;grid-column:1/2;margin-bottom:28px;border-radius:var(--r) 0 0 var(--r)}
    .hc-cell:nth-child(4){grid-row:2/3;grid-column:2/3;border-radius:var(--r) 0 var(--r) var(--r)}
    .hc-label{
      position:absolute;bottom:10px;left:10px;
      background:rgba(248,246,241,.9);backdrop-filter:blur(8px);
      border-radius:50px;padding:4px 12px;
      font-size:.65rem;font-weight:600;color:var(--text2);letter-spacing:.04em;
    }

    /* ─── BAND ─── */
    .band{background:var(--text);padding:1rem 2rem;overflow:hidden}
    .band-track{display:flex;gap:4rem;animation:scroll-band 22s linear infinite;width:max-content}
    @keyframes scroll-band{from{transform:translateX(0)}to{transform:translateX(-50%)}}
    .band-item{display:flex;align-items:center;gap:10px;color:rgba(248,246,241,.65);font-size:.72rem;font-weight:500;white-space:nowrap}
    .band-item i{color:var(--gold);font-size:.85rem}

    /* ─── SHOP ─── */
    .shop-wrap{max-width:1400px;margin:0 auto;padding:5rem 2.5rem 6rem}

    .shop-header{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:2.5rem;flex-wrap:wrap;gap:1rem}
    .sh-left .overline{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.16em;color:var(--sage);margin-bottom:.4rem}
    .sh-left h2{font-family:'Playfair Display',serif;font-size:2.4rem;font-weight:700;color:var(--text);line-height:1}
    .sh-left p{font-size:.88rem;color:var(--text2);margin-top:.4rem}

    /* Category tabs — pill row */
    .ctabs{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:2.5rem}
    .ctab{
      display:flex;align-items:center;gap:7px;
      background:var(--canvas);border:1.5px solid var(--border);
      border-radius:50px;padding:.52rem 1.2rem;
      font-size:.8rem;font-weight:500;color:var(--text2);cursor:pointer;
      transition:var(--ease);font-family:'Outfit',sans-serif;white-space:nowrap;
    }
    .ctab:hover{border-color:var(--sage);color:var(--sage)}
    .ctab.on{background:var(--sage);color:#fff;border-color:var(--sage);box-shadow:0 4px 16px rgba(107,140,110,.3)}
    .ctab .ti{font-size:.9rem}

    /* ─── PRODUCT GRID ─── */
    .pgrid{
      display:grid;
      grid-template-columns:repeat(auto-fill,minmax(270px,1fr));
      gap:1.6rem;
    }
    .pgrid.fading{opacity:.25;transform:translateY(10px);transition:opacity .18s,transform .18s}
    .pgrid.showing{opacity:1;transform:translateY(0);transition:opacity .22s .05s,transform .22s .05s}

    .pcard{
      background:var(--canvas);border:1.5px solid var(--border);border-radius:var(--r);
      overflow:hidden;transition:var(--ease);cursor:pointer;
    }
    .pcard:hover{transform:translateY(-6px);box-shadow:var(--sd2);border-color:var(--sage)}

    .pimg{position:relative;aspect-ratio:1/.95;overflow:hidden;background:var(--bg2)}
    .pimg img{width:100%;height:100%;object-fit:cover;transition:transform .55s ease}
    .pcard:hover .pimg img{transform:scale(1.07)}

    .pbadge{
      position:absolute;top:12px;left:12px;
      font-size:.58rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;
      padding:4px 11px;border-radius:50px;
    }
    .b-new{background:var(--sage);color:#fff}
    .b-sale{background:var(--rust);color:#fff}
    .b-top{background:var(--gold);color:var(--text)}
    .b-pop{background:var(--text);color:#fff}

    .pwish{
      position:absolute;top:12px;right:12px;
      width:34px;height:34px;border-radius:50%;
      background:rgba(255,255,255,.88);border:none;cursor:pointer;
      display:flex;align-items:center;justify-content:center;
      color:var(--text3);font-size:.85rem;
      opacity:0;transition:var(--ease);
    }
    .pcard:hover .pwish{opacity:1}
    .pwish:hover{color:var(--rust);background:#fff}

    .pquick{
      position:absolute;bottom:0;left:0;right:0;
      background:linear-gradient(to top,rgba(30,28,24,.85) 0%,transparent 100%);
      padding:2.2rem 1rem .9rem;
      display:flex;justify-content:center;
      opacity:0;transition:var(--ease);
    }
    .pcard:hover .pquick{opacity:1}
    .pquick-btn{
      background:#fff;border:none;border-radius:50px;
      padding:.58rem 1.6rem;font-size:.75rem;font-weight:600;
      color:var(--sage-dk);cursor:pointer;transition:.2s;font-family:'Outfit',sans-serif;
    }
    .pquick-btn:hover{background:var(--sage);color:#fff}

    .pbody{padding:1.1rem 1.15rem 1.25rem}
    .pcat{font-size:.65rem;font-weight:600;text-transform:uppercase;letter-spacing:.12em;color:var(--text3);margin-bottom:4px}
    .pname{font-family:'Playfair Display',serif;font-size:1.05rem;font-weight:600;color:var(--text);margin-bottom:5px;line-height:1.35}
    .pdesc{font-size:.77rem;color:var(--text2);line-height:1.55;margin-bottom:.8rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
    .pfoot{display:flex;align-items:center;justify-content:space-between}
    .prat{display:flex;align-items:center;gap:5px;font-size:.72rem;color:var(--text2)}
    .stars{color:var(--gold);letter-spacing:-1px;font-size:.78rem}
    .pprice{text-align:right}
    .pprice .now{font-size:1.1rem;font-weight:700;color:var(--sage-dk)}
    .pprice .was{font-size:.7rem;text-decoration:line-through;color:var(--text3);margin-left:4px}
    .padd{
      width:100%;margin-top:.85rem;
      background:var(--sage-lt);border:none;border-radius:var(--rs);
      padding:.68rem;font-size:.82rem;font-weight:600;color:var(--sage-dk);
      cursor:pointer;transition:var(--ease);font-family:'Outfit',sans-serif;
      display:flex;align-items:center;justify-content:center;gap:7px;
    }
    .padd:hover{background:var(--sage);color:#fff}
    .padd.done{background:var(--sage-lt);color:var(--sage-dk)}

    /* ─── CART SIDE ─── */
    .cart-veil{position:fixed;inset:0;z-index:2000;background:rgba(20,18,16,.7);backdrop-filter:blur(8px);opacity:0;visibility:hidden;transition:var(--ease)}
    .cart-veil.on{opacity:1;visibility:visible}
    .cart-panel{
      position:fixed;top:0;right:0;height:100vh;width:100%;max-width:450px;
      background:var(--canvas);border-left:1.5px solid var(--border);
      display:flex;flex-direction:column;
      transform:translateX(105%);transition:transform .38s cubic-bezier(.25,.9,.4,1.05);
      box-shadow:var(--sd3);
    }
    .cart-veil.on .cart-panel{transform:translateX(0)}
    .cp-head{padding:1.3rem 1.5rem;border-bottom:1.5px solid var(--border);display:flex;align-items:center;justify-content:space-between}
    .cp-title{font-family:'Playfair Display',serif;font-size:1.45rem;color:var(--text)}
    .cp-close{background:none;border:none;cursor:pointer;color:var(--text3);font-size:1.05rem;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;transition:.2s}
    .cp-close:hover{background:var(--bg2);color:var(--text)}
    .cp-items{flex:1;overflow-y:auto;padding:1rem 1.2rem;display:flex;flex-direction:column;gap:.8rem}
    .ci{display:flex;gap:.9rem;background:var(--bg);border:1.5px solid var(--border);border-radius:var(--rs);padding:.85rem;position:relative}
    .ci-img{width:64px;height:64px;object-fit:cover;border-radius:8px;flex-shrink:0}
    .ci-info{flex:1}
    .ci-name{font-size:.88rem;font-weight:500;color:var(--text);line-height:1.3;margin-bottom:2px}
    .ci-cat{font-size:.65rem;color:var(--text3);text-transform:uppercase;letter-spacing:.06em;margin-bottom:6px}
    .ci-price{font-size:.9rem;font-weight:700;color:var(--sage-dk)}
    .ci-qty{display:flex;align-items:center;gap:8px;margin-top:6px}
    .qbtn{width:26px;height:26px;border:1.5px solid var(--border);background:var(--canvas);border-radius:7px;cursor:pointer;font-size:.95rem;font-weight:700;color:var(--text2);transition:.15s}
    .qbtn:hover{border-color:var(--sage);color:var(--sage)}
    .qval{font-size:.85rem;font-weight:600;min-width:20px;text-align:center}
    .ci-del{position:absolute;top:9px;right:10px;background:none;border:none;color:var(--text3);cursor:pointer;font-size:.8rem;padding:4px;border-radius:5px;transition:.15s}
    .ci-del:hover{color:var(--rust)}
    .cp-empty{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:.8rem;color:var(--text2);padding:2rem}
    .cp-empty i{font-size:2.8rem;color:var(--border)}
    .cp-foot{padding:1.3rem 1.5rem;border-top:1.5px solid var(--border)}
    .cp-rows{display:flex;flex-direction:column;gap:6px;margin-bottom:1.1rem}
    .cp-row{display:flex;justify-content:space-between;font-size:.84rem;color:var(--text2)}
    .cp-row.grand{font-weight:700;font-size:1rem;color:var(--text);padding-top:8px;border-top:1.5px solid var(--border);margin-top:4px}
    .cp-btn{
      width:100%;background:var(--sage);color:#fff;border:none;border-radius:50px;
      padding:1rem;font-size:.9rem;font-weight:600;cursor:pointer;
      display:flex;align-items:center;justify-content:center;gap:8px;
      transition:var(--ease);font-family:'Outfit',sans-serif;
    }
    .cp-btn:hover{background:var(--sage-dk)}
    .cp-secure{text-align:center;font-size:.68rem;color:var(--text3);margin-top:8px}

    /* ─── CHECKOUT ─── */
    .co-page-wrap{padding-top:65px;background:var(--bg);min-height:100vh}
    .has-topbar .co-page-wrap{padding-top:101px}
    .co-inner{max-width:1100px;margin:0 auto;padding:3rem 2rem;display:grid;grid-template-columns:1fr 400px;gap:2.5rem}
    .co-h1{font-family:'Playfair Display',serif;font-size:2rem;color:var(--text);margin-bottom:.4rem}
    .co-sub{font-size:.88rem;color:var(--text2);margin-bottom:2rem}
    .co-block{background:var(--canvas);border:1.5px solid var(--border);border-radius:var(--r);padding:1.5rem;margin-bottom:1.2rem}
    .co-label{font-size:.73rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:var(--text2);margin-bottom:1.1rem;display:flex;align-items:center;gap:7px}
    .co-label i{color:var(--sage)}
    .frow{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem}
    .frow.full{grid-template-columns:1fr}
    .fg{display:flex;flex-direction:column;gap:5px}
    .fg label{font-size:.73rem;font-weight:600;color:var(--text2)}
    .fg input,.fg select{
      background:var(--bg2);border:1.5px solid var(--border);
      border-radius:var(--rs);padding:.72rem .9rem;
      font-size:.88rem;color:var(--text);font-family:'Outfit',sans-serif;
      transition:.2s;outline:none;
    }
    .fg input:focus,.fg select:focus{border-color:var(--sage);background:var(--canvas)}
    .pmethods{display:flex;gap:.7rem;margin-bottom:1rem}
    .pmethod{
      flex:1;border:1.5px solid var(--border);border-radius:var(--rs);
      padding:.85rem;text-align:center;cursor:pointer;transition:var(--ease);
      font-size:.8rem;font-weight:500;color:var(--text2);
    }
    .pmethod:hover{border-color:var(--sage);color:var(--sage)}
    .pmethod.sel{border-color:var(--sage);background:var(--sage-lt);color:var(--sage-dk)}
    .pmethod i{display:block;font-size:1.25rem;margin-bottom:4px}

    /* Order summary */
    .osum{background:var(--canvas);border:1.5px solid var(--border);border-radius:var(--r);padding:1.5rem;position:sticky;top:121px}
    .osum-title{font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--text);margin-bottom:1.2rem}
    .osum-items{display:flex;flex-direction:column;gap:.75rem;margin-bottom:1.2rem}
    .osi{display:flex;gap:.75rem;align-items:center}
    .osi-img{width:54px;height:54px;object-fit:cover;border-radius:8px;border:1px solid var(--border);flex-shrink:0}
    .osi-info{flex:1}
    .osi-name{font-size:.82rem;font-weight:500;color:var(--text);line-height:1.3}
    .osi-qty{font-size:.68rem;color:var(--text3);margin-top:1px}
    .osi-price{font-size:.88rem;font-weight:700;color:var(--text);flex-shrink:0}
    .odivider{border:none;border-top:1.5px solid var(--border);margin:.9rem 0}
    .orow{display:flex;justify-content:space-between;font-size:.84rem;color:var(--text2);margin-bottom:6px}
    .orow.grand{font-weight:700;font-size:1.05rem;color:var(--text);margin-top:8px;padding-top:8px;border-top:1.5px solid var(--border)}
    .po-btn{
      width:100%;background:var(--sage);color:#fff;border:none;border-radius:50px;
      padding:1rem;font-size:.9rem;font-weight:600;cursor:pointer;margin-top:1.2rem;
      display:flex;align-items:center;justify-content:center;gap:8px;
      transition:var(--ease);font-family:'Outfit',sans-serif;
    }
    .po-btn:hover{background:var(--sage-dk)}
    .po-btn:disabled{opacity:.55;cursor:not-allowed}

    /* ─── CONFIRM ─── */
    .conf-wrap{padding-top:65px;min-height:100vh;background:var(--bg);display:flex;align-items:center;justify-content:center;padding-left:1.5rem;padding-right:1.5rem}
    .has-topbar .conf-wrap{padding-top:101px}
    .conf-box{background:var(--canvas);border:1.5px solid var(--border);border-radius:24px;padding:3rem 2.5rem;max-width:520px;width:100%;text-align:center;box-shadow:var(--sd3)}
    .conf-icon{width:72px;height:72px;background:var(--sage-lt);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem}
    .conf-icon i{font-size:1.9rem;color:var(--sage)}
    .conf-h{font-family:'Playfair Display',serif;font-size:2rem;color:var(--text);margin-bottom:.7rem}
    .conf-p{font-size:.9rem;color:var(--text2);line-height:1.7;margin-bottom:1.5rem}
    .conf-id{display:inline-block;background:var(--bg2);border:1px solid var(--border);border-radius:50px;padding:6px 18px;font-size:.8rem;font-weight:700;color:var(--text2);margin-bottom:2rem;letter-spacing:.06em}
    .conf-details{border:1.5px solid var(--border);border-radius:var(--r);padding:1.2rem;margin-bottom:2rem;text-align:left}
    .conf-row{display:flex;justify-content:space-between;font-size:.84rem;padding:6px 0;border-bottom:1px solid var(--border)}
    .conf-row:last-child{border:none}
    .conf-row span:first-child{color:var(--text2)}
    .conf-row span:last-child{font-weight:600;color:var(--text)}
    .conf-btns{display:flex;gap:.8rem;justify-content:center;flex-wrap:wrap}

    /* ─── FOOTER ─── */
    footer{background:#5c5848;color:rgba(248,246,241,.6)}
    .ft-inner{max-width:1400px;margin:0 auto;padding:3.5rem 2.5rem 2rem;display:grid;grid-template-columns:2.2fr 1fr 1fr 1fr;gap:2.5rem}
    .ft-brand{font-family:'Playfair Display',serif;font-size:1.55rem;color:#fff;margin-bottom:.7rem}
    .ft-brand em{font-style:italic;color:var(--sage)}
    .ft-desc{font-size:.82rem;line-height:1.75;max-width:270px}
    .ft-social{display:flex;gap:.7rem;margin-top:1.2rem}
    .ft-soc{width:34px;height:34px;border:1px solid rgba(248,246,241,.15);border-radius:8px;display:flex;align-items:center;justify-content:center;color:rgba(248,246,241,.5);font-size:.85rem;cursor:pointer;transition:.2s;text-decoration:none}
    .ft-soc:hover{border-color:var(--sage);color:var(--sage)}
    .ft-col-h{font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.14em;color:rgba(248,246,241,.35);margin-bottom:.9rem}
    .ft-link{display:block;font-size:.84rem;color:rgba(248,246,241,.55);text-decoration:none;margin-bottom:.55rem;transition:.2s}
    .ft-link:hover{color:var(--sage)}
    .ft-bot{max-width:1400px;margin:0 auto;padding:1.5rem 2.5rem;border-top:1px solid rgba(248,246,241,.08);display:flex;justify-content:space-between;align-items:center;font-size:.7rem;flex-wrap:wrap;gap:.5rem}
    .ft-bot-links{display:flex;gap:1.5rem}
    .ft-bot-links a{color:rgba(248,246,241,.35);text-decoration:none;transition:.2s}
    .ft-bot-links a:hover{color:rgba(248,246,241,.6)}

    /* ─── LEGAL OVERLAY ─── */
    .legal-veil{position:fixed;inset:0;z-index:3000;background:rgba(20,18,16,.75);display:none;align-items:center;justify-content:center;padding:2rem}
    .legal-box{background:var(--canvas);border-radius:var(--r);max-width:680px;width:100%;max-height:80vh;display:flex;flex-direction:column;border:1.5px solid var(--border);overflow:hidden}
    .legal-hd{padding:1.2rem 1.5rem;border-bottom:1px solid var(--border);display:flex;gap:.5rem;align-items:center;justify-content:space-between;flex-wrap:wrap}
    .ltab{background:none;border:none;cursor:pointer;font-size:.73rem;font-weight:600;text-transform:uppercase;letter-spacing:.1em;padding:5px 12px;border-radius:50px;color:var(--text2);transition:.2s;font-family:'Outfit',sans-serif}
    .ltab.on{background:var(--sage-lt);color:var(--sage-dk)}
    .legal-x{background:none;border:none;cursor:pointer;color:var(--text3);font-size:1rem}
    #legalBody{flex:1;overflow-y:auto;padding:1.5rem;font-size:.88rem;color:var(--text2);line-height:1.75}
    #legalBody h2{font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--text);margin:1.5rem 0 .5rem}
    #legalBody h2:first-child{margin-top:0}
    #legalBody ul{margin:.5rem 0 1rem 1.2rem}
    #legalBody li{margin-bottom:.4rem}

    /* ─── MODAL ─── */
    .modal-veil{position:fixed;inset:0;z-index:4000;background:rgba(20,18,16,.85);backdrop-filter:blur(12px);display:flex;align-items:center;justify-content:center;padding:2rem;transition:opacity .25s}
    .modal-veil.gone{opacity:0;pointer-events:none}
    .modal-box{background:var(--canvas);border-radius:24px;padding:2.8rem 2.5rem;max-width:460px;width:100%;text-align:center;border:1.5px solid var(--border);box-shadow:var(--sd3);position:relative;animation:popIn .4s cubic-bezier(.34,1.56,.64,1)}
    @keyframes popIn{from{transform:scale(.85) translateY(24px);opacity:0}to{transform:scale(1) translateY(0);opacity:1}}
    .micon{width:68px;height:68px;background:linear-gradient(135deg,var(--sage),var(--sage-dk));border-radius:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;box-shadow:0 6px 20px rgba(107,140,110,.4)}
    .micon i{font-size:1.7rem;color:#fff}
    .m-title{font-family:'Playfair Display',serif;font-size:1.75rem;color:var(--text);margin-bottom:.7rem}
    .m-desc{font-size:.88rem;color:var(--text2);line-height:1.7;margin-bottom:1.8rem}
    .m-btns{display:flex;gap:.8rem;justify-content:center;flex-wrap:wrap}
    .m-x{position:absolute;top:14px;right:14px;background:none;border:none;font-size:1.1rem;cursor:pointer;color:var(--text3)}

    /* ─── RESPONSIVE ─── */
    @media(max-width:1024px){
      .hero{grid-template-columns:1fr;min-height:auto}
      .hero-right{display:none}
      .hero-left{padding:4rem 2rem}
      .co-inner{grid-template-columns:1fr}
      .osum{position:static}
      .ft-inner{grid-template-columns:1fr 1fr}
    }
    @media(max-width:680px){
      .nav-mid{display:none}
      .nav-inner{padding:.8rem 1.2rem}
      .shop-wrap{padding:3rem 1.2rem 4rem}
      .ctabs{overflow-x:auto;scrollbar-width:none;-ms-overflow-style:none}
      .ctabs::-webkit-scrollbar{display:none}
      .ft-inner{grid-template-columns:1fr}
      .co-inner{padding:2rem 1.2rem}
      .frow{grid-template-columns:1fr}
      .pmethods{flex-wrap:wrap}
      .topbar{display:none}
      .has-topbar .ha-header{top:0}
      .has-topbar .hero{margin-top:65px}
      .has-topbar .co-page-wrap{padding-top:65px}
      .has-topbar .conf-wrap{padding-top:65px}
    }
  </style>

  <!-- 100% privacy-first analytics -->
<script async src="https://scripts.simpleanalyticscdn.com/latest.js"></script>

</head>
<body class="has-topbar">

<!-- TOPBAR -->
<div class="topbar">🌿 Free shipping on orders over $60 &nbsp;·&nbsp; <span>Use code AURA15 for 15% off your first order</span></div>

<!-- MODAL -->
<div id="modal" class="modal-veil">
  <div class="modal-box">
    <div class="micon"><i class="fas fa-seedling"></i></div>
    <h2 class="m-title">Welcome to HomeAura</h2>
    <p class="m-desc">Curated essentials for a more beautiful, intentional everyday life — home decor, kitchen, beauty, wellness, and pets.</p>
    <div class="m-btns">
      <button class="cta-fill" id="mEnter"><i class="fas fa-arrow-right"></i> Explore Now</button>
      <button class="cta-outline" id="mLater">Maybe Later</button>
    </div>
    <button class="m-x" id="mClose">✕</button>
  </div>
</div>

<!-- ═══════ HOME PAGE ═══════ -->
<div id="homePage" class="page active">

  <header class="ha-header">
    <div class="nav-inner">
      <a class="logo" href="#">
        <div class="logo-mark">H</div>
        <span class="logo-text">Home<em>Aura</em></span>
      </a>
      <nav class="nav-mid">
        <a href="#shop">Home Decor</a>
        <a href="#shop">Kitchen</a>
        <a href="#shop">Beauty</a>
        <a href="#shop">Wellness</a>
        <a href="#shop">Pets</a>
      </nav>
      <div class="nav-right">
        <button class="hbtn" id="tToggle" title="Theme">🌙</button>
        <button class="cart-pill" id="cartBtn">
          <i class="fas fa-bag-shopping"></i>
          <span class="cart-num" id="cartNum">0</span>
          Bag
        </button>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-bg-accent"></div>
    <div class="hero-bg-accent2"></div>
    <div class="hero-left">
      <div class="eyebrow">New Season · Thoughtfully Curated</div>
      <h1 class="hero-h1">Your home,<br><em>beautifully</em><br>lived in.</h1>
      <p class="hero-p">Discover products that bring quiet joy to the everyday — from morning rituals to evening wind-downs. Quality you can feel, style you can trust.</p>
      <div class="hero-badge"><i class="fas fa-leaf" style="color:var(--gold)"></i> 100% Curated · No Fast-Fashion Junk</div>
      <div class="hero-ctas">
        <a href="#shop" class="cta-fill">Shop All Categories <i class="fas fa-arrow-right"></i></a>
        <a href="#shop" class="cta-outline"><i class="fas fa-tag"></i> Best Sellers</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat"><div class="num">25k+</div><div class="lbl">Happy Homes</div></div>
        <div class="hero-stat"><div class="num">5★</div><div class="lbl">Average Rating</div></div>
        <div class="hero-stat"><div class="num">30d</div><div class="lbl">Returns</div></div>
      </div>
    </div>
    <div class="hero-right">
      <div class="hero-collage">
        <div class="hc-cell"><img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=400&h=300&fit=crop" alt="Home"><span class="hc-label">Home Decor</span></div>
        <div class="hc-cell"><img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=300&fit=crop" alt="Kitchen"><span class="hc-label">Kitchen</span></div>
        <div class="hc-cell"><img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=400&h=300&fit=crop" alt="Beauty"><span class="hc-label">Beauty</span></div>
        <div class="hc-cell"><img src="https://images.unsplash.com/photo-1545389336-cf090694435e?w=400&h=300&fit=crop" alt="Wellness"><span class="hc-label">Wellness</span></div>
      </div>
    </div>
  </section>

  <!-- SCROLLING BAND -->
  <div class="band">
    <div class="band-track">
      <div class="band-item"><i class="fas fa-truck"></i> Free Shipping $60+</div>
      <div class="band-item"><i class="fas fa-rotate-left"></i> 30-Day Returns</div>
      <div class="band-item"><i class="fas fa-shield-halved"></i> Secure Checkout</div>
      <div class="band-item"><i class="fas fa-seedling"></i> Sustainably Sourced</div>
      <div class="band-item"><i class="fas fa-star"></i> 25k+ Happy Customers</div>
      <div class="band-item"><i class="fas fa-heart"></i> Ethically Made</div>
      <!-- duplicate for infinite loop -->
      <div class="band-item"><i class="fas fa-truck"></i> Free Shipping $60+</div>
      <div class="band-item"><i class="fas fa-rotate-left"></i> 30-Day Returns</div>
      <div class="band-item"><i class="fas fa-shield-halved"></i> Secure Checkout</div>
      <div class="band-item"><i class="fas fa-seedling"></i> Sustainably Sourced</div>
      <div class="band-item"><i class="fas fa-star"></i> 25k+ Happy Customers</div>
      <div class="band-item"><i class="fas fa-heart"></i> Ethically Made</div>
    </div>
  </div>

  <!-- SHOP -->
  <section class="shop-wrap" id="shop">
    <div class="shop-header">
      <div class="sh-left">
        <div class="overline">Our Collections</div>
        <h2>Shop by Category</h2>
        <p>Handpicked products for every part of your life</p>
      </div>
    </div>
    <div class="ctabs" id="ctabs">
      <button class="ctab on" onclick="switchCat(this,'Home Decor')"><span class="ti">🏡</span> Home Decor</button>
      <button class="ctab" onclick="switchCat(this,'Kitchen')"><span class="ti">🍳</span> Kitchen</button>
      <button class="ctab" onclick="switchCat(this,'Beauty')"><span class="ti">✨</span> Beauty</button>
      <button class="ctab" onclick="switchCat(this,'Wellness')"><span class="ti">🧘</span> Wellness</button>
      <button class="ctab" onclick="switchCat(this,'Pets')"><span class="ti">🐾</span> Pets</button>
    </div>
    <div class="pgrid showing" id="pgrid"></div>
  </section>

  <footer>
    <div class="ft-inner">
      <div>
        <div class="ft-brand">Home<em>Aura</em></div>
        <p class="ft-desc">Beautifully curated everyday essentials that transform how you live. Quality over quantity, intention over impulse.</p>
        <div class="ft-social">
          <a class="ft-soc" href="#"><i class="fab fa-instagram"></i></a>
          <a class="ft-soc" href="#"><i class="fab fa-pinterest"></i></a>
          <a class="ft-soc" href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
      <div>
        <div class="ft-col-h">Shop</div>
        <a href="#shop" class="ft-link">Home Decor</a>
        <a href="#shop" class="ft-link">Kitchen</a>
        <a href="#shop" class="ft-link">Beauty & Care</a>
        <a href="#shop" class="ft-link">Wellness</a>
        <a href="#shop" class="ft-link">Pet Supplies</a>
      </div>
      <div>
        <div class="ft-col-h">Help</div>
        <a href="#" onclick="openLegal('privacy');return false;" class="ft-link">Privacy Policy</a>
        <a href="#" onclick="openLegal('terms');return false;" class="ft-link">Terms of Service</a>
        <a href="#" onclick="openLegal('returns');return false;" class="ft-link">Return Policy</a>
        <a href="#" class="ft-link">Contact Us</a>
      </div>
      <div>
        <div class="ft-col-h">Account</div>
        <a href="#" class="ft-link">My Account</a>
        <a href="#" class="ft-link">Order Tracking</a>
        <a href="#" class="ft-link">Wishlist</a>
        <a href="#" class="ft-link">Newsletter</a>
      </div>
    </div>
    <div class="ft-bot">
      <p>© 2026 HomeAura — All rights reserved.</p>
      <div class="ft-bot-links">
        <a href="#" onclick="openLegal('privacy');return false;">Privacy</a>
        <a href="#" onclick="openLegal('terms');return false;">Terms</a>
        <a href="#" onclick="openLegal('returns');return false;">Returns</a>
      </div>
    </div>
  </footer>

</div><!-- /homePage -->

<!-- ═══════ CHECKOUT ═══════ -->
<div id="checkoutPage" class="page">
  <header class="ha-header">
    <div class="nav-inner">
      <a class="logo" href="#" onclick="showPage('homePage');return false;">
        <div class="logo-mark">H</div>
        <span class="logo-text">Home<em>Aura</em></span>
      </a>
      <div style="font-size:.78rem;color:var(--text3);font-weight:500;letter-spacing:.06em"><i class="fas fa-lock" style="color:var(--sage);margin-right:6px"></i>Secure Checkout</div>
      <button class="hbtn" id="tToggle2">🌙</button>
    </div>
  </header>
  <div class="co-page-wrap">
    <div class="co-inner">
      <div>
        <h1 class="co-h1">Checkout</h1>
        <p class="co-sub">Complete your order below — safe, fast, beautifully simple.</p>
        <div class="co-block">
          <div class="co-label"><i class="fas fa-user"></i> Contact Info</div>
          <div class="frow"><div class="fg"><label>First Name</label><input id="fn" placeholder="Priya"></div><div class="fg"><label>Last Name</label><input id="ln" placeholder="Sharma"></div></div>
          <div class="frow"><div class="fg"><label>Email</label><input id="em" type="email" placeholder="priya@example.com"></div><div class="fg"><label>Phone</label><input id="ph" type="tel" placeholder="+91 00000 00000"></div></div>
        </div>
        <div class="co-block">
          <div class="co-label"><i class="fas fa-location-dot"></i> Delivery Address</div>
          <div class="frow full"><div class="fg"><label>Street Address</label><input id="addr" placeholder="42 Park Street, Apt 4C"></div></div>
          <div class="frow"><div class="fg"><label>City</label><input id="city" placeholder="Mumbai"></div><div class="fg"><label>State</label><input id="state" placeholder="Maharashtra"></div></div>
          <div class="frow"><div class="fg"><label>Postal Code</label><input id="zip" placeholder="400001"></div><div class="fg"><label>Country</label><select id="country"><option>India</option><option>United States</option><option>United Kingdom</option><option>Canada</option><option>Australia</option><option>Germany</option></select></div></div>
        </div>
        <div class="co-block">
          <div class="co-label"><i class="fas fa-credit-card"></i> Payment</div>
          <div class="pmethods">
            <div class="pmethod sel" onclick="setPayMethod(this,'card')"><i class="fas fa-credit-card"></i>Card</div>
            <div class="pmethod" onclick="setPayMethod(this,'paypal')"><i class="fab fa-paypal"></i>PayPal</div>
            <div class="pmethod" onclick="setPayMethod(this,'upi')"><i class="fas fa-mobile-screen"></i>UPI</div>
          </div>
          <div id="cardFields">
            <div class="frow full"><div class="fg"><label>Card Number</label><input id="cn" placeholder="4242  4242  4242  4242" maxlength="19"></div></div>
            <div class="frow"><div class="fg"><label>Expiry</label><input id="exp" placeholder="MM / YY" maxlength="7"></div><div class="fg"><label>CVV</label><input id="cvv" placeholder="•••" maxlength="4"></div></div>
            <div class="frow full"><div class="fg"><label>Name on Card</label><input id="cname" placeholder="Priya Sharma"></div></div>
          </div>
        </div>
      </div>
      <div>
        <div class="osum">
          <div class="osum-title">Your Order</div>
          <div class="osum-items" id="osumItems"></div>
          <hr class="odivider">
          <div class="orow"><span>Subtotal</span><span id="oSubtotal">$0.00</span></div>
          <div class="orow"><span>Shipping</span><span id="oShipping">$5.99</span></div>
          <div class="orow"><span>Tax (8%)</span><span id="oTax">$0.00</span></div>
          <div class="orow grand"><span>Total</span><span id="oTotal">$0.00</span></div>
          <button class="po-btn" id="poBtn" onclick="placeOrder()"><i class="fas fa-lock"></i> Place Order</button>
          <div class="cp-secure" style="margin-top:10px"><i class="fas fa-shield-halved"></i> 256-bit SSL encrypted</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════ CONFIRM ═══════ -->
<div id="confirmPage" class="page">
  <header class="ha-header">
    <div class="nav-inner">
      <a class="logo" href="#" onclick="showPage('homePage');return false;">
        <div class="logo-mark">H</div>
        <span class="logo-text">Home<em>Aura</em></span>
      </a>
      <button class="hbtn" id="tToggle3">🌙</button>
    </div>
  </header>
  <div class="conf-wrap">
    <div class="conf-box">
      <div class="conf-icon"><i class="fas fa-check"></i></div>
      <h1 class="conf-h">Order Confirmed!</h1>
      <p class="conf-p">Thank you for choosing HomeAura! Your items are being carefully prepared. A confirmation & tracking email is on its way to you.</p>
      <div class="conf-id" id="confId">Order #HA-2026-00001</div>
      <div class="conf-details">
        <div class="conf-row"><span>Est. Delivery</span><span>3–5 Business Days</span></div>
        <div class="conf-row"><span>Order Total</span><span id="confTotal">$0.00</span></div>
        <div class="conf-row"><span>Payment</span><span id="confPay">Credit Card</span></div>
        <div class="conf-row"><span>Ship to</span><span id="confAddr">—</span></div>
      </div>
      <div class="conf-btns">
        <button class="cta-fill" onclick="showPage('homePage')"><i class="fas fa-house"></i> Back to Shop</button>
        <button class="cta-outline" onclick="showPage('homePage')">Track Order</button>
      </div>
    </div>
  </div>
</div>

<!-- CART VEIL -->
<div class="cart-veil" id="cartVeil">
  <div class="cart-panel">
    <div class="cp-head">
      <span class="cp-title">Your Bag</span>
      <button class="cp-close" id="cpClose"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="cp-items" id="cpItems"></div>
    <div class="cp-foot" id="cpFoot" style="display:none">
      <div class="cp-rows">
        <div class="cp-row"><span>Subtotal</span><span id="cpSub">$0.00</span></div>
        <div class="cp-row"><span>Shipping</span><span id="cpShip">$5.99</span></div>
        <div class="cp-row grand"><span>Total</span><span id="cpTotal">$0.00</span></div>
      </div>
      <button class="cp-btn" id="cpCheckout"><i class="fas fa-lock"></i> Proceed to Checkout</button>
      <div class="cp-secure"><i class="fas fa-shield-halved"></i> Safe &amp; secure checkout</div>
    </div>
  </div>
</div>

<!-- LEGAL -->
<div class="legal-veil" id="legalVeil">
  <div class="legal-box">
    <div class="legal-hd">
      <div style="display:flex;gap:.4rem;flex-wrap:wrap">
        <button class="ltab on" id="lt-privacy" onclick="openLegal('privacy')">Privacy</button>
        <button class="ltab" id="lt-terms" onclick="openLegal('terms')">Terms</button>
        <button class="ltab" id="lt-returns" onclick="openLegal('returns')">Returns</button>
      </div>
      <button class="legal-x" onclick="closeLegal()"><i class="fas fa-xmark"></i></button>
    </div>
    <div id="legalBody"></div>
  </div>
</div>

<script>
/* ── DATA ── */
const PRODS = {
  'Home Decor':[
    {id:1,name:'Linen Throw Pillow Set',desc:'Set of 2 hand-finished linen pillows in earthy tones. Removable covers, hypoallergenic fill.',price:38.99,old:54.99,rating:4.8,rev:312,badge:'Popular',img:'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?w=400&h=330&fit=crop'},
    {id:2,name:'Woven Seagrass Basket',desc:'Handwoven storage basket with handles. Perfect for blankets, toys, or plants.',price:29.95,old:null,rating:4.7,rev:228,badge:'New',img:'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=400&h=330&fit=crop'},
    {id:3,name:'Ceramic Vase Trio',desc:'Set of 3 matte ceramic vases in varying heights. Neutral tones for any space.',price:44.00,old:59.00,rating:4.9,rev:185,badge:'Top',img:'https://images.unsplash.com/photo-1578500494198-246f612d3b3d?w=400&h=330&fit=crop'},
    {id:4,name:'Macramé Wall Hanging',desc:'Hand-knotted cotton macramé art. 24" wide, with a natural wood dowel.',price:35.50,old:null,rating:4.6,rev:97,badge:null,img:'https://images.unsplash.com/photo-1604999565976-8913ad2ddb7c?w=400&h=330&fit=crop'},
    {id:5,name:'Soy Wax Candle — Cedar',desc:'100% soy wax with cedarwood & sandalwood. 55-hour burn time, reusable jar.',price:22.00,old:28.00,rating:4.8,rev:541,badge:'Sale',img:'https://images.unsplash.com/photo-1608181831688-8d9f8b5b4a8c?w=400&h=330&fit=crop'},
  ],
  'Kitchen':[
    {id:6,name:'Acacia Wood Cutting Board',desc:'Extra-thick acacia board with juice groove. Naturally antibacterial and gorgeous.',price:42.00,old:55.00,rating:4.9,rev:620,badge:'Top',img:'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=400&h=330&fit=crop'},
    {id:7,name:'Ceramic Pour-Over Set',desc:'Matte ceramic dripper + carafe combo. Brews a clean, smooth cup every time.',price:54.00,old:null,rating:4.7,rev:310,badge:'New',img:'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=330&fit=crop'},
    {id:8,name:'Cast Iron Skillet 10"',desc:'Pre-seasoned cast iron skillet. Oven-safe to 500°F, gets better with use.',price:39.99,old:52.00,rating:4.8,rev:849,badge:'Popular',img:'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=330&fit=crop'},
    {id:9,name:'Bamboo Utensil Set',desc:'6-piece bamboo kitchen tool set with wall-mount holder. Sustainable & durable.',price:27.95,old:null,rating:4.6,rev:194,badge:null,img:'https://images.unsplash.com/photo-1585515320310-259814833e62?w=400&h=330&fit=crop'},
    {id:10,name:'Glass Meal Prep Containers',desc:'Set of 5 borosilicate glass containers. Dishwasher & microwave safe.',price:48.00,old:62.00,rating:4.7,rev:437,badge:'Sale',img:'https://images.unsplash.com/photo-1603048588665-791ca4edd482?w=400&h=330&fit=crop'},
  ],
  'Beauty':[
    {id:11,name:'Rose Hip Facial Oil',desc:'Cold-pressed rosehip oil with Vitamin C & A. Brightens and deeply hydrates.',price:32.00,old:42.00,rating:4.8,rev:723,badge:'Popular',img:'https://images.unsplash.com/photo-1570194065650-d99fb4bedf0a?w=400&h=330&fit=crop'},
    {id:12,name:'Konjac Cleansing Sponge',desc:'Natural konjac root sponge with charcoal. Gentle daily exfoliation.',price:14.99,old:null,rating:4.6,rev:289,badge:'New',img:'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=400&h=330&fit=crop'},
    {id:13,name:'Jade Facial Roller',desc:'Genuine jade stone roller. Reduces puffiness and boosts circulation.',price:24.95,old:34.00,rating:4.7,rev:504,badge:'Sale',img:'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=400&h=330&fit=crop'},
    {id:14,name:'Argan Hair Mask',desc:'Weekly deep conditioning mask with pure argan oil. Restores shine and softness.',price:28.00,old:null,rating:4.8,rev:381,badge:'Top',img:'https://images.unsplash.com/photo-1607602132700-068258431b7f?w=400&h=330&fit=crop'},
    {id:15,name:'Lavender Bath Salts',desc:'Himalayan pink salt with lavender essential oil. The perfect evening ritual.',price:18.50,old:24.00,rating:4.9,rev:856,badge:'Popular',img:'https://images.unsplash.com/photo-1591375462079-e38f5c3e4a44?w=400&h=330&fit=crop'},
  ],
  'Wellness':[
    {id:16,name:'Cork Yoga Mat 5mm',desc:'Natural cork surface with rubber base. Non-slip, antimicrobial, eco-friendly.',price:68.00,old:85.00,rating:4.8,rev:512,badge:'Popular',img:'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400&h=330&fit=crop'},
    {id:17,name:'Foam Roller Deep Tissue',desc:'High-density 18" foam roller. Grid pattern for targeted muscle recovery.',price:34.99,old:null,rating:4.7,rev:298,badge:'New',img:'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=330&fit=crop'},
    {id:18,name:'Acupressure Mat & Pillow',desc:'Natural "bed of nails" set. Relieves tension and promotes deeper sleep.',price:44.00,old:58.00,rating:4.6,rev:347,badge:'Sale',img:'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=400&h=330&fit=crop'},
    {id:19,name:'Resistance Band Set',desc:'Set of 5 fabric loop bands in varying strengths. Perfect for home training.',price:26.95,old:null,rating:4.8,rev:689,badge:'Top',img:'https://images.unsplash.com/photo-1598289431512-b97b0917affc?w=400&h=330&fit=crop'},
    {id:20,name:'Buckwheat Meditation Cushion',desc:'Buckwheat-filled round zafu with carry handle. Supports proper sitting posture.',price:52.00,old:65.00,rating:4.9,rev:221,badge:null,img:'https://images.unsplash.com/photo-1545389336-cf090694435e?w=400&h=330&fit=crop'},
  ],
  'Pets':[
    {id:21,name:'Elevated Ceramic Pet Bowls',desc:'Raised ceramic bowl set on bamboo stand. Promotes healthy eating posture.',price:36.99,old:48.00,rating:4.8,rev:437,badge:'Popular',img:'https://images.unsplash.com/photo-1601758174114-e711c0cbaa69?w=400&h=330&fit=crop'},
    {id:22,name:'Organic Catnip Toys 3-Pack',desc:'Plush toys filled with certified organic catnip. Crinkle & bell inside.',price:16.95,old:null,rating:4.7,rev:318,badge:'New',img:'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&h=330&fit=crop'},
    {id:23,name:'Canvas Pet Carrier Bag',desc:'Soft-sided carrier with mesh panels and fleece lining. Airline approved.',price:54.00,old:68.00,rating:4.6,rev:201,badge:'Sale',img:'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=330&fit=crop'},
    {id:24,name:'Natural Grooming Brush',desc:'Boar bristle brush with wooden handle. Removes loose fur, adds natural shine.',price:22.00,old:null,rating:4.8,rev:546,badge:'Top',img:'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400&h=330&fit=crop'},
    {id:25,name:'Felted Wool Pet Cave Bed',desc:'Hand-felted New Zealand wool cave. Thermoregulating and machine washable.',price:62.00,old:78.00,rating:4.9,rev:184,badge:null,img:'https://images.unsplash.com/photo-1526590819173-ec4f5e3e31f6?w=400&h=330&fit=crop'},
  ],
};

let cart=[], selPay='card', activeCat='Home Decor';

function saveCart(){try{localStorage.setItem('ha_cart',JSON.stringify(cart))}catch(e){}}
function loadCart(){try{const s=localStorage.getItem('ha_cart');if(s){cart=JSON.parse(s);renderCart();updateNum()}}catch(e){}}

/* PAGE */
function showPage(id){
  document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));
  document.getElementById(id).classList.add('active');
  window.scrollTo(0,0);syncTheme();
  if(id==='checkoutPage')renderSummary();
}

/* THEME */
function syncTheme(){
  const dark=document.documentElement.getAttribute('data-theme')==='dark';
  ['tToggle','tToggle2','tToggle3'].forEach(id=>{const e=document.getElementById(id);if(e)e.textContent=dark?'☀️':'🌙'});
}
function toggleTheme(){
  const c=document.documentElement.getAttribute('data-theme');
  const n=c==='dark'?'light':'dark';
  document.documentElement.setAttribute('data-theme',n);
  localStorage.setItem('ha_theme',n);syncTheme();
}
function initTheme(){
  const s=localStorage.getItem('ha_theme');
  const p=window.matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light';
  document.documentElement.setAttribute('data-theme',s||p);syncTheme();
}

/* PRODUCTS */
function switchCat(el,cat){
  document.querySelectorAll('.ctab').forEach(t=>t.classList.remove('on'));
  el.classList.add('on');activeCat=cat;
  const g=document.getElementById('pgrid');
  g.classList.remove('showing');g.classList.add('fading');
  setTimeout(()=>{renderProds();g.classList.remove('fading');g.classList.add('showing')},190);
}

function renderProds(){
  const g=document.getElementById('pgrid');if(!g)return;
  const list=PRODS[activeCat]||[];g.innerHTML='';
  const bMap={Popular:'b-pop',New:'b-new',Top:'b-top',Sale:'b-sale'};
  list.forEach(p=>{
    const stars='★'.repeat(Math.floor(p.rating))+(p.rating%1>=.5?'½':'');
    const bc=bMap[p.badge]||'b-new';
    const card=document.createElement('div');card.className='pcard';
    card.innerHTML=`
      <div class="pimg">
        <img src="${p.img}" alt="${p.name}" loading="lazy">
        ${p.badge?`<span class="pbadge ${bc}">${p.badge}</span>`:''}
        <button class="pwish"><i class="fas fa-heart"></i></button>
        <div class="pquick"><button class="pquick-btn" data-id="${p.id}">Quick Add</button></div>
      </div>
      <div class="pbody">
        <div class="pcat">${activeCat}</div>
        <div class="pname">${p.name}</div>
        <div class="pdesc">${p.desc}</div>
        <div class="pfoot">
          <div class="prat"><span class="stars">${stars}</span> ${p.rating} <span style="color:var(--text3)">(${p.rev})</span></div>
          <div class="pprice">
            <span class="now">$${p.price.toFixed(2)}</span>
            ${p.old?`<span class="was">$${p.old.toFixed(2)}</span>`:''}
          </div>
        </div>
        <div><button class="padd" data-id="${p.id}"><i class="fas fa-bag-shopping"></i> Add to Bag</button></div>
      </div>`;
    g.appendChild(card);
  });
  g.querySelectorAll('[data-id]').forEach(btn=>{
    btn.addEventListener('click',e=>{e.preventDefault();addToCart(parseInt(btn.dataset.id));});
  });
}

/* CART */
function addToCart(id){
  const allP=Object.values(PRODS).flat();
  const p=allP.find(x=>x.id===id);if(!p)return;
  const ex=cart.find(i=>i.id===id);
  if(ex)ex.qty++;else cart.push({id:p.id,name:p.name,price:p.price,qty:1,img:p.img,cat:Object.keys(PRODS).find(k=>PRODS[k].includes(p))});
  renderCart();updateNum();saveCart();
  document.querySelectorAll(`[data-id="${id}"]`).forEach(btn=>{
    if(btn.classList.contains('padd')||btn.classList.contains('pquick-btn')){
      const orig=btn.innerHTML;
      btn.innerHTML='<i class="fas fa-check"></i> Added!';btn.classList.add('done');
      setTimeout(()=>{btn.innerHTML=orig;btn.classList.remove('done')},900);
    }
  });
}
function updateNum(){document.getElementById('cartNum').textContent=cart.reduce((s,i)=>s+i.qty,0)}
function renderCart(){
  const wrap=document.getElementById('cpItems');
  const foot=document.getElementById('cpFoot');
  if(!wrap)return;
  if(!cart.length){
    wrap.innerHTML=`<div class="cp-empty"><i class="fas fa-bag-shopping"></i><p style="font-weight:500">Your bag is empty</p><p style="font-size:.8rem;color:var(--text3)">Start adding some items!</p></div>`;
    foot.style.display='none';updateNum();return;
  }
  foot.style.display='block';
  let html='',sub=0;
  cart.forEach(item=>{
    sub+=item.price*item.qty;
    html+=`<div class="ci">
      <img class="ci-img" src="${item.img}" alt="${item.name}">
      <div class="ci-info">
        <div class="ci-name">${item.name}</div>
        <div class="ci-cat">${item.cat||''}</div>
        <div class="ci-price">$${item.price.toFixed(2)}</div>
        <div class="ci-qty">
          <button class="qbtn dec" data-id="${item.id}">−</button>
          <span class="qval">${item.qty}</span>
          <button class="qbtn inc" data-id="${item.id}">+</button>
        </div>
      </div>
      <button class="ci-del" data-id="${item.id}"><i class="fas fa-trash"></i></button>
    </div>`;
  });
  wrap.innerHTML=html;
  const ship=sub>=60?0:5.99;
  document.getElementById('cpSub').textContent=`$${sub.toFixed(2)}`;
  document.getElementById('cpShip').textContent=ship===0?'FREE':`$${ship.toFixed(2)}`;
  document.getElementById('cpTotal').textContent=`$${(sub+ship).toFixed(2)}`;
  wrap.querySelectorAll('.dec').forEach(b=>b.addEventListener('click',()=>chQty(parseInt(b.dataset.id),-1)));
  wrap.querySelectorAll('.inc').forEach(b=>b.addEventListener('click',()=>chQty(parseInt(b.dataset.id),1)));
  wrap.querySelectorAll('.ci-del').forEach(b=>b.addEventListener('click',()=>{cart=cart.filter(x=>x.id!==parseInt(b.dataset.id));renderCart();saveCart()}));
  updateNum();
}
function chQty(id,d){
  const i=cart.findIndex(x=>x.id===id);if(i<0)return;
  cart[i].qty+=d;if(cart[i].qty<=0)cart.splice(i,1);
  renderCart();saveCart();
}

/* SUMMARY */
function renderSummary(){
  const w=document.getElementById('osumItems');if(!w)return;
  w.innerHTML='';let sub=0;
  cart.forEach(item=>{
    sub+=item.price*item.qty;
    const d=document.createElement('div');d.className='osi';
    d.innerHTML=`<img class="osi-img" src="${item.img}" alt="${item.name}"><div class="osi-info"><div class="osi-name">${item.name}</div><div class="osi-qty">Qty: ${item.qty}</div></div><div class="osi-price">$${(item.price*item.qty).toFixed(2)}</div>`;
    w.appendChild(d);
  });
  const ship=sub>=60?0:5.99,tax=sub*.08;
  document.getElementById('oSubtotal').textContent=`$${sub.toFixed(2)}`;
  document.getElementById('oShipping').textContent=ship===0?'FREE':`$${ship.toFixed(2)}`;
  document.getElementById('oTax').textContent=`$${tax.toFixed(2)}`;
  document.getElementById('oTotal').textContent=`$${(sub+ship+tax).toFixed(2)}`;
}

/* ORDER */
function placeOrder(){
  const btn=document.getElementById('poBtn');
  btn.disabled=true;btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Processing…';
  setTimeout(()=>{
    const oid='HA-'+new Date().getFullYear()+'-'+String(Math.floor(Math.random()*90000)+10000);
    document.getElementById('confId').textContent='Order #'+oid;
    let sub=cart.reduce((s,i)=>s+i.price*i.qty,0);
    const ship=sub>=60?0:5.99,tax=sub*.08;
    document.getElementById('confTotal').textContent=`$${(sub+ship+tax).toFixed(2)}`;
    const pm={card:'Credit / Debit Card',paypal:'PayPal',upi:'UPI'};
    document.getElementById('confPay').textContent=pm[selPay]||'Card';
    const c=document.getElementById('city').value||'Your City';
    const s=document.getElementById('state').value||'';
    document.getElementById('confAddr').textContent=c+(s?', '+s:'');
    cart=[];renderCart();updateNum();saveCart();
    btn.disabled=false;btn.innerHTML='<i class="fas fa-lock"></i> Place Order';
    showPage('confirmPage');
  },1800);
}

function setPayMethod(el,m){
  document.querySelectorAll('.pmethod').forEach(p=>p.classList.remove('sel'));
  el.classList.add('sel');selPay=m;
  document.getElementById('cardFields').style.display=m==='card'?'block':'none';
}

/* LEGAL */
const LP={
  privacy:`<h2>Privacy Policy</h2><p><strong>Last updated: May 2026</strong></p><p>At HomeAura, your privacy is sacred. This policy covers how we collect and protect your information.</p><h2>What We Collect</h2><ul><li><strong>Order Info:</strong> Name, email, address when you place an order.</li><li><strong>Payment Data:</strong> Processed via PCI-compliant partners only. We never store card details.</li><li><strong>Usage Data:</strong> Pages visited, items viewed, and preferences.</li></ul><h2>How We Use It</h2><ul><li>To process and ship your orders</li><li>To send order updates and delivery tracking</li><li>To improve our curation and your experience</li></ul><h2>Contact</h2><p>Email <strong>privacy@homeaura.com</strong> with any questions.</p>`,
  terms:`<h2>Terms of Service</h2><p><strong>Last updated: May 2026</strong></p><p>By using HomeAura or placing an order, you agree to these Terms.</p><h2>Orders & Pricing</h2><p>All prices in USD. We may correct pricing errors and limit quantities.</p><h2>Delivery</h2><ul><li>Orders shipped within 1–2 business days.</li><li>Delivery estimates may vary by location.</li></ul><h2>Intellectual Property</h2><p>All branding and content belongs to HomeAura and may not be reproduced.</p>`,
  returns:`<h2>Return Policy</h2><p><strong>Last updated: May 2026</strong></p><p>We want every purchase to feel right. Returns are always simple at HomeAura.</p><h2>30-Day Returns</h2><p>Return most items within 30 days of delivery for a full refund, provided they are unused and in original packaging.</p><h2>How to Return</h2><p>Email <strong>returns@homeaura.com</strong> with your order number. Prepaid shipping label sent within 1 business day.</p><h2>Refunds</h2><p>Processed to your original payment method within 5–7 business days.</p>`
};
function openLegal(p){
  document.getElementById('legalVeil').style.display='flex';
  document.getElementById('legalBody').innerHTML=LP[p];
  document.getElementById('legalBody').scrollTop=0;
  document.querySelectorAll('.ltab').forEach(t=>t.classList.remove('on'));
  document.getElementById('lt-'+p).classList.add('on');
}
function closeLegal(){document.getElementById('legalVeil').style.display='none'}

/* EVENTS */
document.getElementById('cartBtn').addEventListener('click',()=>document.getElementById('cartVeil').classList.add('on'));
document.getElementById('cpClose').addEventListener('click',()=>document.getElementById('cartVeil').classList.remove('on'));
document.getElementById('cartVeil').addEventListener('click',e=>{if(e.target===document.getElementById('cartVeil'))document.getElementById('cartVeil').classList.remove('on')});
document.getElementById('cpCheckout').addEventListener('click',()=>{
  if(!cart.length)return;
  document.getElementById('cartVeil').classList.remove('on');
  setTimeout(()=>showPage('checkoutPage'),200);
});
['tToggle','tToggle2','tToggle3'].forEach(id=>document.getElementById(id)?.addEventListener('click',toggleTheme));

/* MODAL */
function closeModal(){const m=document.getElementById('modal');m.classList.add('gone');setTimeout(()=>m.style.display='none',250)}
document.getElementById('mEnter').addEventListener('click',closeModal);
document.getElementById('mLater').addEventListener('click',closeModal);
document.getElementById('mClose').addEventListener('click',closeModal);
document.getElementById('modal').addEventListener('click',e=>{if(e.target===document.getElementById('modal'))closeModal()});

/* CARD FORMAT */
document.getElementById('cn')?.addEventListener('input',function(){let v=this.value.replace(/\D/g,'').substring(0,16);this.value=v.replace(/(.{4})/g,'$1  ').trim()});
document.getElementById('exp')?.addEventListener('input',function(){let v=this.value.replace(/\D/g,'').substring(0,4);if(v.length>=3)v=v.substring(0,2)+' / '+v.substring(2);this.value=v});

document.addEventListener('keydown',e=>{if(e.key==='Escape')closeLegal()});

document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    const t=a.getAttribute('href');
    if(t&&t!=='#'){const el=document.querySelector(t);if(el){e.preventDefault();el.scrollIntoView({behavior:'smooth'})}}
  });
});

/* INIT */
initTheme();loadCart();renderProds();
</script>
</body>
</html>
