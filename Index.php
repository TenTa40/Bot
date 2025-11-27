<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🤖 راهنمای ربات Highrise</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Segoe UI',Tahoma,sans-serif;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:#333;line-height:1.6;min-height:100vh;padding:10px;}
        .container{max-width:100%;margin:0 auto;}
        .header{text-align:center;margin-bottom:20px;padding:25px 15px;background:rgba(255,255,255,0.95);border-radius:20px;box-shadow:0 10px 25px rgba(0,0,0,0.1);}
        .header h1{color:#4a5568;font-size:1.8rem;margin-bottom:10px;}
        .header p{color:#718096;font-size:1rem;}
        .section{background:rgba(255,255,255,0.95);border-radius:15px;padding:20px 15px;margin-bottom:20px;box-shadow:0 8px 20px rgba(0,0,0,0.1);}
        .section-title{color:#4a5568;font-size:1.4rem;margin-bottom:20px;padding-bottom:10px;border-bottom:3px solid #667eea;display:flex;align-items:center;gap:10px;}
        .command-card{background:linear-gradient(135deg,#f8fafc,#e2e8f0);border-radius:12px;padding:18px;margin-bottom:15px;border-right:4px solid #667eea;}
        .command-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;flex-wrap:wrap;gap:8px;}
        .command-name{color:#2d3748;font-size:1.1rem;font-weight:bold;}
        .command-badge{background:#667eea;color:white;padding:4px 10px;border-radius:12px;font-size:0.75rem;}
        .command-badge.owner{background:#e53e3e;}
        .command-badge.admin{background:#ed8936;}
        .command-description{color:#4a5568;margin-bottom:12px;line-height:1.7;font-size:0.9rem;}
        .command-example{background:#2d3748;color:#e2e8f0;padding:12px;border-radius:8px;font-family:'Courier New',monospace;direction:ltr;text-align:left;font-size:0.85rem;margin-top:10px;}
        .copy-btn{background:#667eea;color:white;border:none;padding:10px 15px;border-radius:8px;cursor:pointer;font-size:0.85rem;margin-top:10px;width:100%;transition:all 0.3s ease;}
        .copy-btn:hover{background:#5a67d8;}
        .footer{text-align:center;margin-top:30px;padding:20px 15px;background:rgba(255,255,255,0.9);border-radius:15px;color:#718096;}
        .contact-info{display:flex;flex-direction:column;gap:12px;margin-top:15px;}
        .contact-item{display:flex;align-items:center;justify-content:center;gap:8px;padding:10px 15px;background:#f7fafc;border-radius:10px;}
        .nav-menu{position:sticky;top:10px;background:rgba(255,255,255,0.95);border-radius:15px;padding:15px;margin-bottom:20px;box-shadow:0 5px 15px rgba(0,0,0,0.1);z-index:100;}
        .nav-title{color:#4a5568;font-size:1.1rem;margin-bottom:12px;text-align:center;}
        .nav-buttons{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;}
        .nav-btn{background:#667eea;color:white;border:none;padding:10px 5px;border-radius:8px;cursor:pointer;font-size:0.8rem;text-align:center;transition:all 0.3s ease;}
        .nav-btn:hover{background:#5a67d8;}
        @keyframes fadeIn{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
        .fade-in{animation:fadeIn 0.5s ease-out;}
        .access-info{background:#fff5f5;border-right:4px solid #fed7d7;padding:15px;border-radius:10px;margin-bottom:20px;}
        .access-title{color:#c53030;font-weight:bold;margin-bottom:10px;display:flex;align-items:center;gap:8px;}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header class="header fade-in">
            <h1>🤖 راهنمای کامل ربات Highrise</h1>
            <p>تمامی دستورات ربات با سطح دسترسی مشخص</p>
        </header>

        <div class="access-info fade-in">
            <div class="access-title">
                <i class="fas fa-shield-alt"></i>
                سطح‌های دسترسی
            </div>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; text-align: center;">
                <div style="background: #38a169; color: white; padding: 8px; border-radius: 8px;">
                    <strong>همه کاربران</strong>
                </div>
                <div style="background: #ed8936; color: white; padding: 8px; border-radius: 8px;">
                    <strong>ادمین‌ها</strong>
                </div>
                <div style="background: #e53e3e; color: white; padding: 8px; border-radius: 8px;">
                    <strong>مالک ربات</strong>
                </div>
                <div style="background: #667eea; color: white; padding: 8px; border-radius: 8px;">
                    <strong>ادمین + مالک</strong>
                </div>
            </div>
        </div>

        <nav class="nav-menu fade-in">
            <div class="nav-title">دسته‌بندی دستورات</div>
            <div class="nav-buttons">
                <button class="nav-btn" onclick="scrollToSection('main')">اصلی</button>
                <button class="nav-btn" onclick="scrollToSection('teleport')">تلپورت</button>
                <button class="nav-btn" onclick="scrollToSection('dance')">رقص</button>
                <button class="nav-btn" onclick="scrollToSection('emote')">ایموت</button>
                <button class="nav-btn" onclick="scrollToSection('reaction')">واکنش</button>
                <button class="nav-btn" onclick="scrollToSection('tip')">تیپ</button>
                <button class="nav-btn" onclick="scrollToSection('fun')">سرگرمی</button>
                <button class="nav-btn" onclick="scrollToSection('admin')">مدیریت</button>
            </div>
        </nav>

        <section id="main" class="section fade-in">
            <h2 class="section-title">🎯 دستورات اصلی</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">راهنما</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description"> نمایش راهنمای کامل ربات(توی پیوی ربات بفرستید)</p>
                <div class="command-example">راهنما</div>
                <button class="copy-btn" onclick="copyText('راهنما')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!status</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">نمایش وضعیت ربات و آمار</p>
                <div class="command-example">!status</div>
                <button class="copy-btn" onclick="copyText('!status')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!speaker [on/off]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">روشن/خاموش کردن سیستم سخنگو</p>
                <div class="command-example">!speaker on</div>
                <button class="copy-btn" onclick="copyText('!speaker on')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!mypos</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">نمایش موقعیت فعلی کاربر</p>
                <div class="command-example">!mypos</div>
                <button class="copy-btn" onclick="copyText('!mypos')">کپی دستور</button>
            </div>
        </section>

        <section id="teleport" class="section fade-in">
            <h2 class="section-title">📍 موقعیت و تلپورت</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!tp [x] [y] [z]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">تلپورت به مختصات مشخص</p>
                <div class="command-example">!tp 5.5 2.0 8.3</div>
                <button class="copy-btn" onclick="copyText('!tp 5.5 2.0 8.3')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!mytp [نام]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ذخیره موقعیت فعلی کاربر</p>
                <div class="command-example">!mytp خانه</div>
                <button class="copy-btn" onclick="copyText('!mytp خانه')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!gotp [نام]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">رفتن به موقعیت ذخیره شده</p>
                <div class="command-example">!gotp خانه</div>
                <button class="copy-btn" onclick="copyText('!gotp خانه')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!settp [نام]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">ذخیره موقعیت تلپورت عمومی</p>
                <div class="command-example">!settp ورودی</div>
                <button class="copy-btn" onclick="copyText('!settp ورودی')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!listtp</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">لیست موقعیت‌های تلپورت</p>
                <div class="command-example">!listtp</div>
                <button class="copy-btn" onclick="copyText('!listtp')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!teleport [موقعیت] @user</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">تلپورت کاربر به موقعیت</p>
                <div class="command-example">!teleport ورودی @username</div>
                <button class="copy-btn" onclick="copyText('!teleport ورودی @username')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!moveto [موقعیت]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">جابجایی ربات به موقعیت</p>
                <div class="command-example">!moveto ورودی</div>
                <button class="copy-btn" onclick="copyText('!moveto ورودی')">کپی دستور</button>
            </div>
        </section>

        <section id="dance" class="section fade-in">
            <h2 class="section-title">💃 رقص</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">[عدد ۱-۲۳۰]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">شروع رقص با شماره (انگلیسی یا فارسی)</p>
                <div class="command-example">15</div>
                <button class="copy-btn" onclick="copyText('15')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">[نام رقص]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">شروع رقص با نام انگلیسی</p>
                <div class="command-example">floss</div>
                <button class="copy-btn" onclick="copyText('floss')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!stopdance</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">توقف رقص فعلی</p>
                <div class="command-example">!stopdance</div>
                <button class="copy-btn" onclick="copyText('!stopdance')">کپی دستور</button>
            </div>
        </section>

        <section id="emote" class="section fade-in">
            <h2 class="section-title">🎭 ایموت</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!emote [نام]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">اجرای ایموت برای خود</p>
                <div class="command-example">!emote wave</div>
                <button class="copy-btn" onclick="copyText('!emote wave')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!emote [نام] @user</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">اجرای ایموت برای کاربر دیگر</p>
                <div class="command-example">!emote wave @username</div>
                <button class="copy-btn" onclick="copyText('!emote wave @username')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!allemote [نام]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">اجرای ایموت برای همه کاربران</p>
                <div class="command-example">!allemote wave</div>
                <button class="copy-btn" onclick="copyText('!allemote wave')">کپی دستور</button>
            </div>
        </section>

        <section id="reaction" class="section fade-in">
            <h2 class="section-title">❤️ واکنش</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!heart</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ارسال قلب به کاربر</p>
                <div class="command-example">!heart</div>
                <button class="copy-btn" onclick="copyText('!heart')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!heart [تعداد]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ارسال تعداد مشخص قلب</p>
                <div class="command-example">!heart 5</div>
                <button class="copy-btn" onclick="copyText('!heart 5')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!heart @user [تعداد]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ارسال قلب به کاربر مشخص</p>
                <div class="command-example">!heart @username 3</div>
                <button class="copy-btn" onclick="copyText('!heart @username 3')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!allheart [تعداد]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">ارسال قلب به همه کاربران</p>
                <div class="command-example">!allheart 3</div>
                <button class="copy-btn" onclick="copyText('!allheart 3')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!thumbs</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ارسال واکنش 👍</p>
                <div class="command-example">!thumbs</div>
                <button class="copy-btn" onclick="copyText('!thumbs')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!wave</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ارسال واکنش 👋</p>
                <div class="command-example">!wave</div>
                <button class="copy-btn" onclick="copyText('!wave')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!wink</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">ارسال واکنش 😉</p>
                <div class="command-example">!wink</div>
                <button class="copy-btn" onclick="copyText('!wink')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!clap @user</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">دست زدن برای کاربر</p>
                <div class="command-example">!clap @username</div>
                <button class="copy-btn" onclick="copyText('!clap @username')">کپی دستور</button>
            </div>
        </section>

        <section id="tip" class="section fade-in">
            <h2 class="section-title">💰 تیپ و اقتصاد</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!tip @user [مبلغ]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">ارسال تیپ به کاربر دیگر (فقط ادمین)</p>
                <div class="command-example">!tip @username 100</div>
                <button class="copy-btn" onclick="copyText('!tip @username 100')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!tipall [مبلغ]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">تیپ به همه کاربران (فقط ادمین)</p>
                <div class="command-example">!tipall 50</div>
                <button class="copy-btn" onclick="copyText('!tipall 50')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!tiplb</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">نمایش لیدربورد تیپ</p>
                <div class="command-example">!tiplb</div>
                <button class="copy-btn" onclick="copyText('!tiplb')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!mytips</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">آمار تیپ‌های من</p>
                <div class="command-example">!mytips</div>
                <button class="copy-btn" onclick="copyText('!mytips')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!lb [نوع]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">نمایش لیدربورد (tip/chat/time)</p>
                <div class="command-example">!lb tip</div>
                <button class="copy-btn" onclick="copyText('!lb tip')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!autotip [on/off]</span>
                    <span class="command-badge owner">مالک</span>
                </div>
                <p class="command-description">فعال/غیرفعال تیپ خودکار</p>
                <div class="command-example">!autotip on</div>
                <button class="copy-btn" onclick="copyText('!autotip on')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!setautotip [مبلغ] [مدت]</span>
                    <span class="command-badge owner">مالک</span>
                </div>
                <p class="command-description">تنظیم تیپ خودکار</p>
                <div class="command-example">!setautotip 10 300</div>
                <button class="copy-btn" onclick="copyText('!setautotip 10 300')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!roomtip [on/off]</span>
                    <span class="command-badge owner">مالک</span>
                </div>
                <p class="command-description">تیپ شانسی روم</p>
                <div class="command-example">!roomtip on</div>
                <button class="copy-btn" onclick="copyText('!roomtip on')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!setroomtip [مبلغ] [مدت]</span>
                    <span class="command-badge owner">مالک</span>
                </div>
                <p class="command-description">تنظیم تیپ شانسی روم</p>
                <div class="command-example">!setroomtip 5 600</div>
                <button class="copy-btn" onclick="copyText('!setroomtip 5 600')">کپی دستور</button>
            </div>
        </section>

        <section id="fun" class="section fade-in">
            <h2 class="section-title">🎰 سرگرمی</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!flip</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">شیر یا خط</p>
                <div class="command-example">!flip</div>
                <button class="copy-btn" onclick="copyText('!flip')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!roll</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">تاس ریختن</p>
                <div class="command-example">!roll</div>
                <button class="copy-btn" onclick="copyText('!roll')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!choose [گزینه‌ها]</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">انتخاب بین گزینه‌ها</p>
                <div class="command-example">!choose پیتزا همبرگر</div>
                <button class="copy-btn" onclick="copyText('!choose پیتزا همبرگر')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!love @user1 @user2</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">محاسبه درصد عشق بین دو کاربر</p>
                <div class="command-example">!love @user1 @user2</div>
                <button class="copy-btn" onclick="copyText('!love @user1 @user2')">کپی دستور</button>
            </div>
        </section>

        <section id="admin" class="section fade-in">
            <h2 class="section-title">👑 مدیریت</h2>
            
            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!addadmin @user</span>
                    <span class="command-badge owner">مالک</span>
                </div>
                <p class="command-description">افزودن ادمین</p>
                <div class="command-example">!addadmin @username</div>
                <button class="copy-btn" onclick="copyText('!addadmin @username')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!removeadmin @user</span>
                    <span class="command-badge owner">مالک</span>
                </div>
                <p class="command-description">حذف ادمین</p>
                <div class="command-example">!removeadmin @username</div>
                <button class="copy-btn" onclick="copyText('!removeadmin @username')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!adminlist</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">لیست ادمین‌ها</p>
                <div class="command-example">!adminlist</div>
                <button class="copy-btn" onclick="copyText('!adminlist')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!setwelcome [متن]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">تنظیم پیام خوشآمدگویی</p>
                <div class="command-example">!setwelcome سلام {username} خوش آمدی</div>
                <button class="copy-btn" onclick="copyText('!setwelcome سلام {username} خوش آمدی')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!setwelcome_reaction [واکنش]</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">تنظیم واکنش خوشآمدگویی</p>
                <div class="command-example">!setwelcome_reaction clap</div>
                <button class="copy-btn" onclick="copyText('!setwelcome_reaction clap')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!welcome</span>
                    <span class="command-badge">همه</span>
                </div>
                <p class="command-description">نمایش وضعیت خوشآمدگویی</p>
                <div class="command-example">!welcome</div>
                <button class="copy-btn" onclick="copyText('!welcome')">کپی دستور</button>
            </div>

            <div class="command-card">
                <div class="command-header">
                    <span class="command-name">!ns</span>
                    <span class="command-badge admin">ادمین</span>
                </div>
                <p class="command-description">نمایش اطلاعات سرور</p>
                <div class="command-example">!ns</div>
                <button class="copy-btn" onclick="copyText('!ns')">کپی دستور</button>
            </div>
        </section>

        <footer class="footer fade-in">
            <h3>📞 ارتباط با سازنده</h3>
            <p>برای دریافت ربات رایگان یا راهنمایی بیشتر</p>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fab fa-telegram"></i>
                    <span>@TenTa11</span>
                </div>
            </div>
            <p style="margin-top: 15px; color: #a0aec0; font-size: 0.9rem;">
                توسعه داده شده توسط تن تا
            </p>
        </footer>
    </div>

    <script>
        function copyText(text) {
            navigator.clipboard.writeText(text).then(function() {
                showNotification('دستور کپی شد');
            }).catch(function(err) {
                showNotification('خطا در کپی');
            });
        }

        function showNotification(message) {
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }

            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                left: 20px;
                background: #38a169;
                color: white;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                z-index: 1000;
                text-align: center;
                font-size: 0.9rem;
                animation: slideIn 0.3s ease;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 2000);
        }

        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                const offset = 80;
                const sectionTop = section.offsetTop - offset;
                
                window.scrollTo({
                    top: sectionTop,
                    behavior: 'smooth'
                });
            }
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateY(-100%); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateY(0); opacity: 1; }
                to { transform: translateY(-100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.6s ease-out forwards';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        document.querySelectorAll('.section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>
