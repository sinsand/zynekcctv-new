<?php
// Version: 1.1.5; ModSettings

$txt['smf3'] = 'ส่วนนี้อนุญาตให้คุณปรับแต่ง Mods ที่ติดตั้งในระบบและข้อกำหนดพื้นฐานในฟอรั่มของคุณ<br />คุณจะเห็นตัวเลือกสำหรับ <a href="' . $scripturl . '?action=theme;sa=settings;id=' . $settings['theme_id'] . ';sesc=' . $context['session_id'] . '">การปรับแต่งธีม</a> มากขึ้น ต้องการความช่วยเหลือและคำแนะนำเพิ่มเติมสำหรับการปรับแต่ง ให้คลิกที่ไอค่อนเครื่องหมายคำถาม';

$txt['mods_cat_features'] = 'ความสามารถขั้นพื้นฐาน';
$txt['pollMode'] = 'สำรวจความคิดเห็น (โพลล์)';
$txt['smf34'] = 'ปิดโพลล์';
$txt['smf32'] = 'เปิดใช้งานการสำรวจความคิดเห็น (โพลล์)';
$txt['smf33'] = 'แสดงโพลล์เหมือนหัวข้อ';
$txt['allow_guestAccess'] = 'อนุญาตให้บุคคลทั่วไปใช้งานฟอรั่ม';
$txt['userLanguage'] = 'เปิดให้ผู้ใช้เลือกภาษาได้';
$txt['allow_editDisplayName'] = 'อนญาตให้ผู้ใช้เปลี่ยนชื่อที่ใช้แสดงผล?';
$txt['allow_hideOnline'] = 'อนุญาตให้ซ่อนสถานะการออนไลน์?';
$txt['allow_hideEmail'] = 'อนุญาตให้ผู้ใช้งานซ่อนอีเมล์ของเขาจากสาธารณะ (ยกเว้นจากผู้ดำเนินการ)?';
$txt['guest_hideContacts'] = 'ไม่แสดงรายละเอียดของสมาชิกกับบุคคลทั่วไป';
$txt['titlesEnable'] = 'เปิดส่วนไตเติ้ลส่วนตัว';
$txt['enable_buddylist'] = 'เปิดใช้งานรายชื่อเพื่อน';
$txt['default_personalText'] = 'ค่าเริ่มต้นข้อความส่วนบุคคล';
$txt['max_signatureLength'] = 'จำนวนตัวอักษรทั้งหมดที่อนุญาตให้มีในลายเซ็น<div class="smalltext">(0 = ไม่จำกัด)</div>';
$txt['number_format'] = 'รปแบบตัวเลขมาตรฐาน';
$txt['time_format'] = 'รูปแบบเวลาปกติ';
$txt['time_offset'] = 'ส่วนต่างของเวลาระหว่าง เวลาท้องถิ่นกับเวลาในระบบ<div class="smalltext">(ตัวเลือกเพิ่มเฉพาะสมาชิก)</div>';
$txt['failed_login_threshold'] = 'จำนวนครั้งที่เข้าระบบไม่ผ่าน';
$txt['lastActive'] = 'ระยะเวลาที่สมาชิกออนไลน์';
$txt['trackStats'] = 'ติดตามสถิติ';
$txt['hitStats'] = 'ติดตามครั้งฮิต (ต้องเปิดใช้งานติดตามสถิติด้วยถึงจะทำงาน)';
$txt['enableCompressedOutput'] = 'เปิดระบบบีบอัดข้อมูลส่งออก';
$txt['databaseSession_enable'] = 'เปิดใช้เซสชั่นฐานข้อมูล';
$txt['databaseSession_loose'] = 'อนุญาตให้บราวเซอร์ย้อนกลับไปโดยใช้แคช';
$txt['databaseSession_lifetime'] = 'เวลาในเซสชั่น';
$txt['enableErrorLogging'] = 'ใช้งานการเก็บบันทึกข้อผิดพลาด';
$txt['cookieTime'] = 'ค่าปกติของระยะเวลาล็อคอินของคุกกี้ล่าสุด (นาที)';
$txt['localCookies'] = 'เปิดใช้การเก็บข้อมูลคุ๊กกี๊ลงบนเครื่องผู้ใช้งาน<div class="smalltext">(ไม่สามารถใช้กับ SSI ได้)</div>';
$txt['globalCookies'] = 'ใช้คุ๊กกี้กับ subdomain<div class="smalltext">(ปิดการใช้งาน การเก็บข้อมูลคุ๊กกี๊ลงบนเครื่องผู้ใช้งานก่อน!)</div>';
$txt['securityDisable'] = 'ปิดการใช้งานตรวจสอบรหัสผ่าน ก่อนเข้าศูนย์ดำเนินการระบบ';
$txt['send_validation_onChange'] = 'ส่งรหัสผ่านให้ผู้ใช้ หากเขาทำการเปลี่ยนแปลงที่อยู่อีเมล์';
$txt['approveAccountDeletion'] = 'ต้องการอนุมัติจากผู้ดูระบบเมื่อลบชื่อผู้ใช้งาน';
$txt['autoOptDatabase'] = 'ปรับปรุงตารางทุกๆกี่วัน?<div class="smalltext">(0 = ไม่ใช้งาน)</div>';
$txt['autoOptMaxOnline'] = 'จำนวนสมาชิกออนไลน์สูงสุดที่อนุญาต ขณะปรับปรุงตาราง<div class="smalltext">(0 = ไม่จำกัด)</div>';
$txt['autoFixDatabase'] = 'ซ่อมแซมตารางที่เสียหายโดยอัตโนมัติ';
$txt['allow_disableAnnounce'] = 'ยอมให้ผู้ใช้ระงับแจ้งประกาศ';
$txt['disallow_sendBody'] = 'ไม่อนุญาตใส่ข้อความในประกาศ?';
$txt['modlog_enabled'] = 'เปิดใช้งานบันทึกการดูแล';
$txt['queryless_urls'] = 'แสดง URLs โดยปราศจาก ?\'s<div class="smalltext"><b>Apache เท่านั้น!</b></div>';
$txt['max_image_width'] = 'ขนาดความกว้าง สูงสุดสำหรับรูปในกระทู้ (0 = ไม่กำหนด)';
$txt['max_image_height'] = 'ขนาดความสูง สูงสุดสำหรับรูปในกระทู้ (0 = ไม่กำหนด)';
$txt['mail_type'] = 'ชนิดของเมล์';
$txt['mail_type_default'] = '(ค่ามาตรฐานของ PHP)';
$txt['smtp_host'] = 'เซิร์ฟเวอร์ SMTP';
$txt['smtp_port'] = 'พอร์ต SMTP';
$txt['smtp_username'] = 'ชื่อผู้ใช้ SMTP';
$txt['smtp_password'] = 'รหัสผ่าน SMTP';
$txt['enableReportPM'] = 'เปิดการใช้งานรายงานข้อความส่วนตัว';
$txt['max_pm_recipients'] = 'จำนวนข้อความส่วนตัวสูงสุด ที่อนุญาตให้ส่งในครั้งเดียว <div class="smalltext">(0 ไม่จำกัด, ยกเว้นผู้ดูแลระบบ)</div>';
$txt['pm_posts_verification'] = 'ใส่รหัสเมื่อต้องการส่งข้อความส่วนตัว <div class="smalltext">(0 ไม่จำกัด, ยกเว้นผู้ดูแลระบบ)</div>';
$txt['pm_posts_per_hour'] = 'จำนวนข้อความส่วนตัวที่จะส่งได้ต่อชั่วโมง <div class="smalltext">(0 ไม่จำกัด, ยกเว้นผู้ดูแล)</div>';

$txt['mods_cat_layout'] = 'วางรูปแบบ';
$txt['compactTopicPagesEnable'] = 'จำกัดผลรวมของหมายเลขแสดงหน้า';
$txt['smf235'] = 'แสดงหน้าต่อเนื่องที่จะแสดงผล:';
$txt['smf236'] = 'จะแสดงผล';
$txt['todayMod'] = 'เปิดใช้ &quot;Today mod&quot;';
$txt['smf290'] = 'ถูกปิด';
$txt['smf291'] = 'เฉพาะวันนี้';
$txt['smf292'] = 'วันนี้และเมื่อวานนี้';
$txt['topbottomEnable'] = 'เปิดการใช้งานปุ่ม ขึ้นบน/ลงล่าง';
$txt['onlineEnable'] = 'แสดงออนไลน์/ออฟไลน์ในกระทู้และ PM';
$txt['enableVBStyleLogin'] = 'เข้าสู่ระบบแบบ VB ทุกๆ หน้า';
$txt['defaultMaxMembers'] = 'สมาชิกต่อหนึ่งหน้าในรายชื่อของสมาชิกทั้งหมด';
$txt['timeLoadPageEnable'] = 'แสดงเวลาที่ใช้ในการสร้างหน้าทุกหน้า';
$txt['disableHostnameLookup'] = 'ปิด hostname lookups';
$txt['who_enabled'] = 'เปิดใช้งาน ให้ดูรายชื่อผู้ที่ออนไลน์';

$txt['smf293'] = 'การ์มา';
$txt['karmaMode'] = 'โหมดการ์มา';
$txt['smf64'] = 'ปิดการ์มา|เปิดการ์มารวม|เปิดการ์มาบวก/ลบ';
$txt['karmaMinPosts'] = 'กำหนดจำนวนของกระทู้ที่จะทำการแก้ไขการ์มา';
$txt['karmaWaitTime'] = 'กำหนดเวลาที่ต้องรอเป็นชั่วโมง';
$txt['karmaTimeRestrictAdmins'] = 'กำหนดให้ผู้ดำเนินการมีเวลาที่ต้องรอเช่นกัน';
$txt['karmaLabel'] = 'ชื่อการ์มา';
$txt['karmaApplaudLabel'] = 'ชื่อการ์มา applaud';
$txt['karmaSmiteLabel'] = 'ชื่อการ์มา smite';

$txt['caching_information'] = '<div align="center"><b><u>Important! Read this first before enabling these features.</b></u></div><br />
	SMF supports caching through the use of accelerators. The currently supported accelerators include:<br />
	<ul>
		<li>APC</li>
		<li>eAccelerator</li>
		<li>Turck MMCache</li>
		<li>Memcached</li>
		<li>Zend Platform/Performance Suite (Not Zend Optimizer)</li>
	</ul>
	Caching will only work on your server if you have PHP compiled with one of the above optimizers, or have memcache
	available. <br /><br />
	SMF performs caching at a variety of levels. The higher the level of caching enabled the more CPU time will be spent
	retrieving cached information. If caching is available on your machine it is recommended that you try caching at level 1 first.
	<br /><br />
	Note that if you use memcached you need to provide the server details in the setting below. This should be entered as a comma separated list
	as shown in the example below:<br />
	&quot;server1,server2,server3:port,server4&quot;<br /><br />
	Note that if no port is specified SMF will use port 11211. SMF will attempt to perform rough/random load balancing across the servers.
	<br /><br />
	%s
	<hr />';

$txt['detected_no_caching'] = '<b style="color: red;">SMF has not been able to detect a compatible accelerator on your server.</b>';
$txt['detected_APC'] = '<b style="color: green">SMF has detected that your server has APC installed.';
$txt['detected_eAccelerator'] = '<b style="color: green">SMF has detected that your server has eAccelerator installed.';
$txt['detected_MMCache'] = '<b style="color: green">SMF has detected that your server has MMCache installed.';
$txt['detected_Zend'] = '<b style="color: green">SMF has detected that your server has Zend installed.';
$txt['detected_Memcached'] = '<b style="color: green">SMF has detected that your server has Memcached installed.';

$txt['cache_enable'] = 'ระดับแคช';
$txt['cache_off'] = 'ไม่มีแคช';
$txt['cache_level1'] = 'แคชระดับ 1';
$txt['cache_level2'] = 'แคชระดับ 2 (ไม่แนะนำ)';
$txt['cache_level3'] = 'แคชระดับ 3 (ไม่แนะนำ)';
$txt['cache_memcached'] = 'ตั้งค่าหน่วยความจำแคช';

?>