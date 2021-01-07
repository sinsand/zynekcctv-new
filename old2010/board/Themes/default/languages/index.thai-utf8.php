<?php
// Version: 1.1.9; Index

global $forum_copyright, $forum_version, $webmaster_email;

// Locale (strftime, pspell_new) and spelling. (pspell_new, can be left as '' normally.)
// For more information see:
//   - http://www.php.net/function.pspell-new
//   - http://www.php.net/function.setlocale
// Again, SPELLING SHOULD BE '' 99% OF THE TIME!!  Please read this!
$txt['lang_locale'] = 'th_TH.utf8';
$txt['lang_dictionary'] = 'en';
$txt['lang_spelling'] = 'american';

// Character set and right to left?
$txt['lang_character_set'] = 'UTF-8';
$txt['lang_rtl'] = false;

$txt['days'] = array('อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์');
$txt['days_short'] = array('อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.');
// Months must start with 1 => 'January'. (or translated, of course.)
$txt['months'] = array(1 => 'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
$txt['months_titles'] = array(1 => 'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
$txt['months_short'] = array(1 => 'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');

$txt['newmessages0'] = 'เป็นข้อความใหม่';
$txt['newmessages1'] = 'ข้อความใหม่';
$txt['newmessages3'] = 'ข้อความใหม่';
$txt['newmessages4'] = ',';

$txt[2] = 'ผู้ดูแล';

$txt[10] = 'บันทึก';

$txt[17] = 'แก้ไข';
$txt[18] = $context['forum_name'] . ' - หน้าแรก';
$txt[19] = 'สมาชิก';
$txt[20] = 'รายชื่อบอร์ด';
$txt[21] = 'กระทู้';
$txt[22] = 'กระทู้ล่าสุด';

$txt[24] = '(ไม่มีหัวข้อ)';
$txt[26] = 'กระทู้';
$txt[27] = 'ดูรายละเอียด';
$txt[28] = 'บุคคลทั่วไป';
$txt[29] = 'ผู้เขียน';
$txt[30] = 'เมื่อ';
$txt[31] = 'ลบทิ้ง';
$txt[33] = 'เริ่มหัวข้อใหม่';

$txt[34] = 'เข้าสู่ระบบ';
// Use numeric entities in the below string.
$txt[35] = 'ชื่อผู้ใช้งาน';
$txt[36] = 'รหัสผ่าน';

$txt[40] = 'ไม่พบชื่อผู้ใช้งานนี้';

$txt[62] = 'ผู้ดูแลบอร์ด';
$txt[63] = 'ลบหัวข้อ';
$txt[64] = 'หัวข้อ';
$txt[66] = 'แก้ไขข้อความ';
$txt[68] = 'ชื่อ';
$txt[69] = 'อีเมล์';
$txt[70] = 'หัวข้อ';
$txt[72] = 'ข้อความ';

$txt[79] = 'ข้อมูลส่วนตัว';

$txt[81] = 'กรุณาเลือกรหัสผ่าน';
$txt[82] = 'ยืนยันรหัสผ่านอีกครั้ง';
$txt[87] = 'ตำแหน่ง';

$txt[92] = 'ดูรายละเอียดของ';
$txt[94] = 'รวม';
$txt[95] = 'กระทู้';
$txt[96] = 'เว็บไซต์';
$txt[97] = 'สมัครสมาชิก';

$txt[101] = 'ดัชนีข้อความ';
$txt[102] = 'ข่าว';
$txt[103] = 'หน้าแรก';

$txt[104] = 'ใส่/ปลดกุญแจหัวข้อ';
$txt[105] = 'ตั้งกระทู้';
$txt[106] = 'เกิดข้อผิดพลาด!';
$txt[107] = 'เวลา';
$txt[108] = 'ออกจากระบบ';
$txt[109] = 'เริ่มโดย';
$txt[110] = 'ตอบ';
$txt[111] = 'กระทู้ล่าสุด';
$txt[114] = 'ผู้ดำเนินการเข้าสู่ระบบ';
// Use numeric entities in the below string.
$txt[118] = 'หัวข้อ';
$txt[119] = 'ช่วยเหลือ';
$txt[121] = 'ลบข้อความ';
$txt[125] = 'แจ้งเตือน';
$txt[126] = 'เมื่อมีคนตอบกระทู้นี้ คุณต้องการให้แจ้งเตือนทางอีเมล์?';
// Use numeric entities in the below string.
$txt[130] = "ด้วยความปรารถนาดี,\n " . $context['forum_name'] . '';
$txt[131] = 'แจ้งเตือนเมื่อมีผู้ตอบ';
$txt[132] = 'ย้ายข้อความ';
$txt[133] = 'ย้ายไป';
$txt[139] = 'หน้า';
$txt[140] = 'ผู้ใช้เมื่อ ' . $modSettings['lastActive'] . ' นาทีที่ผ่านมา';
$txt[144] = 'ข้อความส่วนตัว';
$txt[145] = 'ตอบโดยอ้างถึงข้อความ';
$txt[146] = 'ตอบ';

$txt[151] = 'ไม่มีข้อความ';
$txt[152] = 'คุณมี';
$txt[153] = 'ข้อความ ';
$txt[154] = 'ลบข้อความนี้';

$txt[158] = 'ผู้ใช้งานขณะนี้';
$txt[159] = 'ข้อความส่วนตัว';
$txt[160] = 'กระโดดไป';
$txt[161] = 'go';
$txt[162] = 'คุณต้องการจะลบหัวข้อนี้?';
$txt[163] = 'ใช่';
$txt[164] = 'ไม่ใช่';

$txt[166] = 'ผลการค้นหา';
$txt[167] = 'จบรายงานการค้นหา';
$txt[170] = 'ไม่พบคำที่ต้องการ';
$txt[176] = 'ที่';

$txt[182] = 'ค้นหา';
$txt[190] = 'ทั้งหมด';

$txt[193] = 'กลับไปหน้าที่แล้ว';
$txt[194] = 'เตือน';
$txt[195] = 'ข้อความที่เริ่มโดย';
$txt[196] = 'หัวข้อ';
$txt[197] = 'เริ่มหัวข้อโดย';
$txt[200] = 'ค้นหาจากรายชื่อสมาชิกทั้งหมด';
$txt[201] = 'กรุณาต้อนรับสมาชิกใหม่';
$txt[208] = 'ศูนย์ดำเนินการระบบ';
$txt[211] = 'แก้ไขครั้งสุดท้าย';
$txt[212] = 'คุณต้องการยกเลิกการแจ้งเตือนสำหรับข้อความนี้?';

$txt[214] = 'กระทู้เมื่อเร็วๆ นี้';

$txt[227] = 'ที่อยู่';
$txt[231] = 'เพศ';
$txt[233] = 'วันที่สมัครสมาชิก';

$txt[234] = 'ดูกระทู้ล่าสุดบนฟอรั่ม';
$txt[235] = 'เป็นหัวข้อปรับปรุงเมื่อไม่นาน';

$txt[238] = 'ชาย';
$txt[239] = 'หญิง';

$txt[240] = 'รูปแบบตัวอักษรผิดในช่องชื่อผู้ใช้งาน กรุณาใช้ชื่อผู้ใช้งานภาษาอังกฤษ<br />คุณจะสามารถใช้ตัวอักษรพิเศษและภาษาไทยได้หลังจากเข้าสู่ระบบโดยเปลี่ยนในรายละเอียดส่วนตัวของคุณ';

$txt['welcome_guest'] = 'ยินดีต้อนรับคุณ, <b>' . $txt[28] . '</b> กรุณา <a href="' . $scripturl . '?action=login">เข้าสู่ระบบ</a> หรือ <a href="' . $scripturl . '?action=register">ลงทะเบียน</a>';
$txt['welcome_guest_activate'] = '<br /><a href="' . $scripturl . '?action=activate">ส่งอีเมล์ยืนยันการใช้งาน?</a>';
$txt['hello_member'] = 'สวัสดี,';
// Use numeric entities in the below string.
$txt['hello_guest'] = 'ยินดีต้อนรับ,';
$txt[247] = 'สวัสดีคุณ';
$txt[248] = 'ยินดีต้อนรับคุณ';
$txt[249] = 'กรุณา';
$txt[250] = 'กลับ';
$txt[251] = 'เลือกหัวข้อ';

// Escape any single quotes in here twice.. 'it\'s' -> 'it\\\'s'.
$txt[279] = 'ข้อความโดย';

$txt[287] = 'ยิ้ม';
$txt[288] = 'โกรธ';
$txt[289] = 'ยิ้มกว้างๆ';
$txt[290] = 'ขำขัน';
$txt[291] = 'เศร้า';
$txt[292] = 'ยิ้มเท่ห์';
$txt[293] = 'ยิงฟันยิ้ม';
$txt[294] = 'ตกใจ';
$txt[295] = 'เจ๋ง';
$txt[296] = 'ฮืม';
$txt[450] = 'ขยิบตา';
$txt[451] = 'แลบลิ้น';
$txt[526] = 'อายจัง';
$txt[527] = 'รูดซิบปาก';
$txt[528] = 'ลังเล';
$txt[529] = 'จุมพิต';
$txt[530] = 'ร้องไห้';

$txt[298] = 'ผู้ดูแล';
$txt[299] = 'ผู้ดูแล';

$txt[300] = 'มาร์คบอร์ดนี้ว่าอ่านหมดแล้ว';
$txt[301] = 'อ่าน';
$txt[302] = 'ใหม่';

$txt[303] = 'แสดงผู้ใช้งานทั้งหมด';
$txt[305] = 'แสดง';
$txt[307] = 'อีเมล์';

$txt[308] = 'ดูสมาชิก';
$txt[309] = 'จาก';
$txt[310] = 'สมาชิกทั้งหมด';
$txt[311] = 'ถึง';
$txt[315] = 'ลืมรหัสผ่าน?';

$txt[317] = 'วันที่';
// Use numeric entities in the below string.
$txt[318] = 'จาก';
$txt[319] = 'หัวข้อ';
$txt[322] = 'ได้รับข้อความใหม่';
$txt[324] = 'ถึง';

$txt[330] = 'หัวข้อ';
$txt[331] = 'สมาชิก';
$txt[332] = 'รายชื่อสมาชิก';
$txt[333] = 'กระทู้ใหม่';
$txt[334] = 'ไม่มีกระทู้ใหม่';

$txt['sendtopic_send'] = 'ส่ง';

$txt[371] = 'ส่วนต่างของเวลาระหว่าง เวลาท้องถิ่นกับเวลาในระบบ';
$txt[377] = 'หรือ';

$txt[398] = 'ไม่พบสิ่งที่ต้องการค้นหา';

$txt[418] = 'การแจ้งเตือน';

$txt[430] = 'ขออภัย, %s คุณถูกแบนจากการใช้บอร์ดนี้';

$txt[452] = 'มาร์คข้อความทั้งหมดว่าอ่านแล้ว';

$txt[454] = 'หัวข้อน่าสนใจ (มีผู้ตอบมากกว่า ' . $modSettings['hotTopicPosts'] . ' ครั้ง)';
$txt[455] = 'หัวข้อน่าสนใจมาก (มีผู้ตอบมากกว่า ' . $modSettings['hotTopicVeryPosts'] . ' ครั้ง)';
$txt[456] = 'หัวข้อที่ถูกใส่กุญแจ';
$txt[457] = 'หัวข้อปกติ';
$txt['participation_caption'] = 'ข้อความของคุณอยู่ในหัวข้อนี้';

$txt[462] = 'ดำเนินการ';

$txt[465] = 'พิมพ์';
$txt[467] = 'รายละเอียด';
$txt[468] = 'สรุปหัวข้อ';
$txt[470] = 'ยังไม่มีข้อความ';
$txt[471] = 'ข้อความ';
$txt[473] = 'ชื่อนี้มีสมาชิกอื่นใช้แล้ว';

$txt[488] = 'จำนวนสมาชิกทั้งหมด';
$txt[489] = 'จำนวนตอบกระทู้ทั้งหมด';
$txt[490] = 'จำนวนหัวข้อทั้งหมด';

$txt[497] = 'ระยะเวลาที่จะอยู่ในระบบ (นาที)';

$txt[507] = 'แสดงตัวอย่าง';
$txt[508] = 'คงสถานะการเข้าระบบไว้ตลอด';

$txt[511] = 'บันทึกการเข้า';
// Use numeric entities in the below string.
$txt[512] = 'IP';

$txt[513] = 'ICQ';
$txt[515] = 'เว็บไซต์';

$txt[525] = 'โดย';

$txt[578] = 'ชั่วโมง';
$txt[579] = 'วัน';

$txt[581] = ', คือผู้ใช้คนใหม่';

$txt[582] = 'ค้นหาสำหรับ';

$txt[603] = 'AIM';
// In this string, please use +'s for spaces.
$txt['aim_default_message'] = 'Hi.+Are+you+there?';
$txt[604] = 'YIM';

$txt[616] = 'โปรดทราบ ขณะนี้ระบบกำลังอยู่ในโหมด \'บำรุงรักษา\'';

$txt[641] = 'อ่าน';
$txt[642] = 'ครั้ง';

$txt[645] = 'สถิติการใช้งานฟอรั่ม';
$txt[656] = 'สมาชิกล่าสุด';
$txt[658] = 'จำนวนหมวดหมู่ทั้งหมด';
$txt[659] = 'กระทู้ล่าสุด';

$txt[660] = 'คุณได้รับ';
$txt[661] = 'คลิก';
$txt[662] = 'ที่นี่';
$txt[663] = 'เพื่อแสดง';

$txt[665] = 'จำนวนบอร์ดทั้งหมด';

$txt[668] = 'พิมพ์หน้านี้';

$txt[679] = 'ส่วนนี้จะต้องเป็นอีเมล์ที่ถูกต้อง';

$txt[683] = 'มากเกินบรรยาย';
$txt[685] = $context['forum_name'] . ' - ศูนย์กลางข้อมูล';

$txt[707] = 'ส่งหัวข้อนี้';

$txt['sendtopic_title'] = 'ส่งหัวข้อ &quot;%s&quot; ถึงเพื่อน';
// Use numeric entities in the below three strings.
$txt['sendtopic_dear'] = 'ถึง %s,';
$txt['sendtopic_this_topic'] = 'ฉันต้องการให้คุณดูหัวข้อ "%s" ใน ' . $context['forum_name'] . '.  หากต้องการ กรุณากดลิ้งค์นี้';
$txt['sendtopic_thanks'] = 'ขอบคุณมาก';
$txt['sendtopic_sender_name'] = 'ชื่อของคุณ';
$txt['sendtopic_sender_email'] = 'ที่อยู่อีเมล์ของคุณ';
$txt['sendtopic_receiver_name'] = 'ชื่อผู้รับ';
$txt['sendtopic_receiver_email'] = 'ที่อยู่อีเมล์ของผู้รับ';
$txt['sendtopic_comment'] = 'ใส่ข้อความ';
// Use numeric entities in the below string.
$txt['sendtopic2'] = 'ได้มีการเพิ่มความคิดเห็นเกี่ยวกับหัวข้อนี้แล้ว';

$txt[721] = 'ซ่อนอีเมล์ของคุณจากสาธารณะ?';

$txt[737] = 'เลือกทั้งหมด';

// Use numeric entities in the below string.
$txt[1001] = 'ฐานข้อมูลผิดพลาด';
$txt[1002] = 'ลองอีกครั้ง ถ้าเกิดการผิดพลาดอีกครั้ง ให้แจ้งผู้ดูแลระบบด้วย';
$txt[1003] = 'ไฟล์';
$txt[1004] = 'บรรทัด';
// Use numeric entities in the below string.
$txt[1005] = 'SMF ได้ตรวจพบและซ่อมแซมข้อผิดพลาดในฐานข้อมูล ถ้าคุณดำเนินต่อไปเพื่อมีปัญหาหรือดำเนินต่อไปเพื่อรับอีเมล์เหล่านี้, โปรดติดต่อเว็บโฮสติ้งของคุณ';
$txt['database_error_versions'] = '<b>บันทึก:</b> ฐานข้อมูลคุณต้องการอัพเกรดใหม่ ฟอรั่มของคุณในขณะนี้เป็นเวอร์ชั่น ' . $forum_version . ', ด้วยเหตุนี้ SMF ของคุณ ' . $modSettings['smfVersion'] . '. มันถูกแนะนำกับเวอร์ชั่นล่าสุดในไฟล์ upgrade.php.';
$txt['template_parse_error'] = 'Template เกิดข้อผิดพลาด!';
$txt['template_parse_error_message'] = 'It seems something has gone sour on the forum with the template system.  This problem should only be temporary, so please come back later and try again.  If you continue to see this message, please contact the administrator.<br /><br />คุณยังสามารถ <a href="javascript:location.reload();">รีเฟรชหน้านี้</a>.';
$txt['template_parse_error_details'] = 'There was a problem loading the <tt><b>%1$s</b></tt> template or language file.  Please check the syntax and try again - remember, single quotes (<tt>\'</tt>) often have to be escaped with a slash (<tt>\\</tt>).  To see more specific error information from PHP, try <a href="' . $boardurl . '%1$s">accessing the file directly</a>.<br /><br />คุณอาจจะต้องการพยายาม <a href="javascript:location.reload();">รีเฟรชหน้านี้</a> หรือ <a href="' . $scripturl . '?theme=1">ใช้ธีมมาตรฐาน</a>.';

$txt['smf10'] = '<b>วันนี้</b> เวลา ';
$txt['smf10b'] = '<b>เมื่อวานนี้</b> เวลา ';
$txt['smf20'] = 'สำรวจความคิดเห็น (โพลล์)';
$txt['smf21'] = 'คำถาม';
$txt['smf23'] = 'โหวต';
$txt['smf24'] = 'จำนวนผู้โหวตทั้งหมด';
$txt['smf25'] = 'shortcut: กด alt+s เพื่อตั้งกระทู้ หรือ alt+p แสดงตัวอย่าง';
$txt['smf29'] = 'ดูผลโหวต';
$txt['smf30'] = 'ใส่กุญแจสำหรับโหวต';
$txt['smf30b'] = 'ปลดกุญแจสำหรับโหวต';
$txt['smf39'] = 'แก้ไขโพลล์';
$txt['smf43'] = 'โพลล์';
$txt['smf47'] = '1 วัน';
$txt['smf48'] = '1 สัปดาห์';
$txt['smf49'] = '1 เดือน';
$txt['smf50'] = 'ตลอดกาล';
$txt['smf52'] = 'เข้าสู่ระบบด้วยชื่อผู้ใช้ รหัสผ่าน และระยะเวลาในเซสชั่น';
$txt['smf53'] = '1 ชั่วโมง';
$txt['smf56'] = 'ย้ายแล้ว';
$txt['smf57'] = 'โปรดใส่คำอธิบายอย่างย่อเพื่อระบุ<br />ว่าทำไมถึงถูกย้าย';
$txt['smf60'] = 'ขออภัย คุณยังไม่มีจำนวนกระทู้พอเพียงที่จะทำการแก้ไขการ์มา คุณต้องการอย่างต่ำ ';
$txt['smf62'] = 'ขออภัย คุณไม่สามารถดำเนินการซ้ำภายในเวลาที่กำหนด คุณจะต้องรอ ';
$txt['smf82'] = 'บอร์ด';
$txt['smf88'] = 'ใน';
$txt['smf96'] = 'หัวข้อติดหมุด';

$txt['smf138'] = 'ลบ';

$txt['smf199'] = 'ข้อความส่วนตัวของคุณ';

$txt['smf211'] = 'KB';

$txt['smf223'] = '[สถิติอื่นๆ]';

// Use numeric entities in the below three strings.
$txt['smf238'] = 'โค๊ด';
$txt['smf239'] = 'อ้างจาก';
$txt['smf240'] = 'อ้างถึง';

$txt['smf251'] = 'แยกหัวข้อ';
$txt['smf252'] = 'รวมหัวข้อ';
$txt['smf254'] = 'ชื่อสำหรับหัวข้อใหม่';
$txt['smf255'] = 'แยกเฉพาะกระทู้นี้';
$txt['smf256'] = 'แยกหัวข้อนี้และรวมกระทู้นี้ด้วย';
$txt['smf257'] = 'เลือกคำตอบที่จะแยก';
$txt['smf258'] = 'เริ่มหัวข้อใหม่';
$txt['smf259'] = 'หัวข้อถูกแยกออกเรียบร้อยแล้ว';
$txt['smf260'] = 'ที่อยู่ของหัวข้อเก่า';
$txt['smf261'] = 'กรุณาเลือกกระทู้ที่ต้องการแยก';
$txt['smf264'] = 'หัวข้อถูกรวมเรียบร้อยแล้ว';
$txt['smf265'] = 'หัวข้อเพิ่งถูกรวม';
$txt['smf266'] = 'หัวข้อที่จะถูกรวม';
$txt['smf267'] = 'บอร์ดเป้าหมาย';
$txt['smf269'] = 'หัวข้อเป้าหมาย';
$txt['smf274'] = 'คุณแน่ใจหรือไม่ที่จะรวม';
$txt['smf275'] = 'กับ';
$txt['smf276'] = 'ฟังค์ชั่นนี้จะรวมข้อความสองข้อความจากสองหัวข้อเข้าด้วยกัน ข้อความจะถูกจัดเรียงตามวันเวลาที่กระทู้โดยข้อความที่กระทู้ก่อนจะอยู่บนสุด';

$txt['smf277'] = 'ติดหมุดให้หัวข้อนี้อยู่ด้านบน';
$txt['smf278'] = 'ยกเลิกการติดหมุด';
$txt['smf279'] = 'ล็อกหัวข้อ';
$txt['smf280'] = 'ยกเลิกการล็อกหัวข้อ';

$txt['smf298'] = 'การค้นหาขั้นสูง';

$txt['smf299'] = 'เรื่องความปลอดภัยขั้นสูง:';
$txt['smf300'] = 'คุณยังไม่ถูกลบ ';

$txt['smf301'] = 'หน้านี้ถูกสร้างขึ้นภายในเวลา ';
$txt['smf302'] = ' วินาที กับ ';
$txt['smf302b'] = ' คำสั่ง';

$txt['smf315'] = 'ใช้ฟังค์ชั่นนี้เพื่อแจ้งผู้ดูแลเกี่ยวกับข้อความที่กระทู้ผิด';

$txt['online2'] = 'ออนไลน์';
$txt['online3'] = 'ออฟไลน์';
$txt['online4'] = 'ข้อความส่วนตัว (ออนไลน์)';
$txt['online5'] = 'ข้อความส่วนตัว (ออฟไลน์)';
$txt['online8'] = 'สถานะ';

$txt['topbottom4'] = 'ขึ้นบน';
$txt['topbottom5'] = 'ลงล่าง';

$forum_copyright = '<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank">Powered by ' . $forum_version . '</a> | <a href="http://www.smfclub.com/" title="รับติดตั้งเว็บบอร์ดSMFฟรี ปรับแต่งSMFราคาถูก สอนการใช้งานSMF" target="_blank">Modify by SMFClub</a> | 
<a href="http://www.simplemachines.org/about/copyright.php" title="Free Forum Software" target="_blank">SMF &copy; 2006-2009, Simple Machines LLC</a>';

$txt['calendar3'] = 'วันเกิด:';
$txt['calendar4'] = 'กิจกรรม:';
$txt['calendar3b'] = 'วันเกิดเร็วๆ นี้:';
$txt['calendar4b'] = 'กิจกรรมเร็วๆ นี้:';
// Prompt for holidays in the calendar, leave blank to just display the holiday's name.
$txt['calendar5'] = '';
$txt['calendar9'] = 'เดือน:';
$txt['calendar10'] = 'ปี:';
$txt['calendar11'] = 'วัน:';
$txt['calendar12'] = 'หัวข้อกิจกรรม:';
$txt['calendar13'] = 'เพิ่มในนี้:';
$txt['calendar20'] = 'แก้ไขกิจกรรม';
$txt['calendar21'] = 'ลบกิจกรรมนี้?';
$txt['calendar22'] = 'ลบกิจกรรม';
$txt['calendar23'] = 'เพิ่มกิจกรรม';
$txt['calendar24'] = 'ปฏิทิน';
$txt['calendar37'] = 'ลิ้งค์ไปยังปฏิทิน';
$txt['calendar43'] = 'เชื่อมสู่กิจกรรม';
$txt['calendar47'] = 'ปฏิทินเร็วๆ นี้';
$txt['calendar47b'] = 'ปฏิทินวันนี้';
$txt['calendar51'] = 'สัปดาห์';
$txt['calendar54'] = 'จำนวนวัน:';
$txt['calendar_how_edit'] = 'คุณแก้ไขกิจกรรมเหล่านี้อย่างไร?';
$txt['calendar_link_event'] = 'ลิ้งค์กิจกรรมถึงหัวข้อ:';
$txt['calendar_confirm_delete'] = 'คุณแน่ใจหรือไม่ที่ต้องการลบกิจกรรมนี้?';
$txt['calendar_linked_events'] = 'กิจกรรมที่ลิ้งค์';

$txt['moveTopic1'] = 'สร้างลิงค์ไปที่หัวข้อที่ถูกย้าย';
$txt['moveTopic2'] = 'เปลี่ยนชื่อของหัวข้อนี้';
$txt['moveTopic3'] = 'หัวข้อใหม่';
$txt['moveTopic4'] = 'เปลี่ยนชื่อของหัวข้อนี้ทุกๆ คำตอบ';

$txt['theme_template_error'] = 'ไม่สามารถโหลด template \'%s\' ได้';
$txt['theme_language_error'] = 'ไม่สามารถโหลดไฟล์ภาษา \'%s\' ได้';

$txt['parent_boards'] = 'บอร์ดย่อย';

$txt['smtp_no_connect'] = 'ไม่สามารถเชื่อมต่อ SMTP ได้';
$txt['smtp_port_ssl'] = 'การตั้งค่าพอร์ต SMTP ไม่ถูกต้อง; มันควรจะเป็น 465 สำหรับเซิร์ฟเวอร์ SSL';
$txt['smtp_bad_response'] = 'ไม่สามารถดึงโค๊ดจากเซิร์ฟเวอร์อีเมล์ได้';
$txt['smtp_error'] = 'การส่งอีเมล์ผิดพลาด: ';
$txt['mail_send_unable'] = 'ไม่สามารถส่งอีเมล์ \'%s\' ได้';

$txt['mlist_search'] = 'ค้นหาผู้ใช้';
$txt['mlist_search2'] = 'ค้นหาอีกครั้ง';
$txt['mlist_search_email'] = 'ค้นหาอีเมล์';
$txt['mlist_search_messenger'] = 'ค้นหาชื่อเล่น';
$txt['mlist_search_group'] = 'ค้นหาตำแหน่ง';
$txt['mlist_search_name'] = 'ค้นหาชื่อ';
$txt['mlist_search_website'] = 'ค้นหาเว็บไซต์';
$txt['mlist_search_results'] = 'ผลการค้นหาสำหรับ';

$txt['attach_downloaded'] = 'ดาวน์โหลด';
$txt['attach_viewed'] = 'ดู';
$txt['attach_times'] = 'ครั้ง';

$txt['MSN'] = 'MSN';

$txt['settings'] = 'การตั้งค่า';
$txt['never'] = 'ไม่มีเลย';
$txt['more'] = 'มากกว่า';

$txt['hostname'] = 'ชื่อโฮส';
$txt['you_are_post_banned'] = '%s, คุณถูกห้ามตั้งกระทู้หรือส่งข้อความส่วนตัวในฟอรั่มนี้';
$txt['ban_reason'] = 'เหตุผล';

$txt['tables_optimized'] = 'เพิ่มประสิทธิภาพให้กับฐานข้อมูล';

$txt['add_poll'] = 'เพิ่มสำรวจความคิดเห็น (โพลล์)';
$txt['poll_options6'] = 'คุณสามารถเลือกได้แค่ %s ตัวเลือก';
$txt['poll_remove'] = 'ลบสำรวจความคิดเห็น (โพลล์)';
$txt['poll_remove_warn'] = 'คุณแน่ใจหรือไม่ที่จะลบสำรวจความคิดเห็น?';
$txt['poll_results_expire'] = 'ผลลัพธ์จะถูกแสดงเมื่อได้ปิดการโหวต';
$txt['poll_expires_on'] = 'ปิดการโหวต';
$txt['poll_expired_on'] = 'ปิดการโหวต';
$txt['poll_change_vote'] = 'ลบโหวต';
$txt['poll_return_vote'] = 'ตัวเลือกโหวต';

$txt['quick_mod_remove'] = 'ลบหัวข้อที่เลือก';
$txt['quick_mod_lock'] = 'ล็อคหัวข้อที่เลือก';
$txt['quick_mod_sticky'] = 'ติดหมุดหัวข้อที่เลือก';
$txt['quick_mod_move'] = 'ย้ายหัวข้อที่เลือกไป';
$txt['quick_mod_merge'] = 'รวมหัวข้อที่เลือก';
$txt['quick_mod_markread'] = 'มาร์คว่าได้อ่านแล้ว';
$txt['quick_mod_go'] = 'Go!';
$txt['quickmod_confirm'] = 'คุณแน่ใจหรือไม่?';

$txt['spell_check'] = 'ตรวจสอบคำสะกด';

$txt['quick_reply_1'] = 'ตอบด่วน';
$txt['quick_reply_2'] = 'ด้วยฟังค์ชั่น <u>ตอบด่วน</u> คุณสามารถใช้โค๊ดและ เครื่องหมายแสดงอารมณ์ได้ เหมือนการตั้งกระทู้ธรรมดา แต่สามารถทำได้สะดวกกว่า';
$txt['quick_reply_warning'] = 'คำเตือน: หัวข้อนี้ถูกล็อค!<br />ผู้ดูแลเท่านั้นที่สามารถตอบกระทู้นี้ได้';

$txt['notification_enable_board'] = 'คุณแน่ใจหรือไม่ที่จะเปิดการเตือนเมื่อมีหัวข้อใหม่ในบอร์ดนี้?';
$txt['notification_disable_board'] = 'คุณแน่ใจหรือไม่ที่จะปิดการเตือนเมื่อมีหัวข้อใหม่ในบอร์ดนี้?';
$txt['notification_enable_topic'] = 'คุณแน่ใจหรือไม่ที่จะเปิดการเตือนเมื่อมีการตอบกระทู้ในหัวข้อนี้?';
$txt['notification_disable_topic'] = 'คุณแน่ใจหรือไม่ที่จะปิดการเตือนเมื่อมีการตอบกระทู้ในหัวข้อนี้?';

$txt['rtm1'] = 'แจ้งลบกระทู้นี้หรือติดต่อผู้ดูแล';

$txt['unread_topics_visit'] = 'หัวข้อเมื่อเร็วๆ นี้ที่ยังไม่ได้อ่าน';
$txt['unread_topics_visit_none'] = 'ไม่มีหัวข้อที่ยังไม่ได้อ่าน ตั้งแต่อยู่ในระบบครั้งล่าสุด <a href="' . $scripturl . '?action=unread;all">คลิกที่นี่ เพื่อลองดูหัวข้อที่ยังไม่ได้อ่านทั้งหมด</a>';
$txt['unread_topics_all'] = 'หัวข้อที่ยังไม่ได้อ่านทั้งหมด';
$txt['unread_replies'] = 'หัวข้ออัพเดท';

$txt['who_title'] = 'มีใครบ้างที่ออนไลน์';
$txt['who_and'] = ' และ ';
$txt['who_viewing_topic'] = ' กำลังดูหัวข้อนี้';
$txt['who_viewing_board'] = ' กำลังดูบอร์ดนี้';
$txt['who_member'] = 'สมาชิก';

$txt['powered_by_php'] = 'Powered by PHP';
$txt['powered_by_mysql'] = 'Powered by MySQL';
$txt['valid_html'] = 'Valid HTML 4.01!';
$txt['valid_xhtml'] = 'Valid XHTML 1.0!';
$txt['valid_css'] = 'Valid CSS!';

$txt['guest'] = 'บุคคลทั่วไป';
$txt['guests'] = 'บุคคลทั่วไป';
$txt['user'] = 'สมาชิก';
$txt['users'] = 'สมาชิก';
$txt['hidden'] = 'ซ่อนตัว';
$txt['buddy'] = 'เพื่อน';
$txt['buddies'] = 'เพื่อน';
$txt['most_online_ever'] = 'ออนไลน์มากที่สุด';
$txt['most_online_today'] = 'วันนี้ออนไลน์มากที่สุด';

$txt['merge_select_target_board'] = 'เลือกบอร์ดเป้าหมายสำหรับหัวข้อที่จะรวมกัน';
$txt['merge_select_poll'] = 'เลือกโพลล์ที่จะอยู่ในหัวข้อที่รวมกัน';
$txt['merge_topic_list'] = 'เลือกหัวข้อที่จะรวมกัน';
$txt['merge_select_subject'] = 'เลือกหัวข้อของกระทู้ที่จะรวมกัน';
$txt['merge_custom_subject'] = 'ชื่อหัวข้อใหม่';
$txt['merge_enforce_subject'] = 'เปลี่ยนหัวข้อของทุกข้อความให้ตรงกัน';
$txt['merge_include_notifications'] = 'รวมการแจ้งเตือนด้วยหรือไม่?';
$txt['merge_check'] = 'รวมกันหรือไม่?';
$txt['merge_no_poll'] = 'ไม่มีโพลล์';

$txt['response_prefix'] = 'Re: ';
$txt['current_icon'] = 'ไอค่อนขณะนี้';

$txt['smileys_current'] = 'ชุดสัญลักษณ์แสดงอารมณ์ขณะนี้';
$txt['smileys_none'] = 'ไม่มีสัญลักษณ์แสดงอารมณ์';
$txt['smileys_forum_board_default'] = 'ฟอรั่ม/บอร์ดมาตรฐาน';

$txt['search_results'] = 'ผลการค้นหา';
$txt['search_no_results'] = 'ไม่พบคำที่ต้องการ';

$txt['totalTimeLogged1'] = 'รวมเวลาที่อยู่ในระบบ: ';
$txt['totalTimeLogged2'] = ' วัน, ';
$txt['totalTimeLogged3'] = ' ชั่วโมงและ ';
$txt['totalTimeLogged4'] = ' นาที ';
$txt['totalTimeLogged5'] = 'วัน ';
$txt['totalTimeLogged6'] = 'ชั่วโมง ';
$txt['totalTimeLogged7'] = 'นาที';

$txt['approve_thereis'] = 'ตอนนี้มี';
$txt['approve_thereare'] = 'ตอนนี้มี';
$txt['approve_member'] = 'สมาชิกหนึ่งคน';
$txt['approve_members'] = 'สมาชิกหลายคน';
$txt['approve_members_waiting'] = 'กำลังรอการอนุมัติ';

$txt['notifyboard_turnon'] = 'คุณต้องการให้มีการแจ้งเตือนเมื่อมีผู้ตั้งหัวข้อใหม่ในบอร์ดนี้หรือไม่?';
$txt['notifyboard_turnoff'] = 'คุณแน่ใจหรือไม่ ที่จะไม่ต้องการให้มีการแจ้งเตือนเมื่อมีหัวข้อใหม่ภายในบอร์ดนี้?';

$txt['activate_code'] = 'รหัสเปิดการทำงานของคุณคือ';

$txt['find_members'] = 'ค้นหาสมาชิก';
$txt['find_username'] = 'ชื่อ, ชื่อผู้ใช้, หรือ อีเมล์';
$txt['find_buddies'] = 'แสดงเพื่อนเท่านั้น?';
$txt['find_wildcards'] = 'ใช้อักษรพิเศษ: *, ?';
$txt['find_no_results'] = 'ไม่พบ';
$txt['find_results'] = 'ผลการค้นหา';
$txt['find_close'] = 'ปิด';

$txt['unread_since_visit'] = 'แสดงกระทู้ที่ยังไม่ได้อ่าน';
$txt['show_unread_replies'] = 'แสดงกระทู้ที่ตอบกลับหัวข้อของคุณ';

$txt['change_color'] = 'เปลี่ยนสี';

$txt['quickmod_delete_selected'] = 'ลบกระทู้ที่เลือก';

// In this string, don't use entities. (&amp;, etc.)
$txt['show_personal_messages'] = 'คุณได้รับข้อความส่วนตัวใหม่\\nเปิดอ่านเดี่ยวนี้?';

$txt['previous_next_back'] = '&laquo; หน้าที่แล้ว';
$txt['previous_next_forward'] = 'ต่อไป &raquo;';

$txt['movetopic_auto_board'] = '[บอร์ด]';
$txt['movetopic_auto_topic'] = '[ลิ้งค์หัวข้อ]';
$txt['movetopic_default'] = 'หัวข้อนี้ได้ถูกย้ายไปบอร์ด ' . $txt['movetopic_auto_board'] . ".\n\n" . $txt['movetopic_auto_topic'];

$txt['upshrink_description'] = 'หดหรือขยายหัวข้อ';

$txt['mark_unread'] = 'มาร์คหัวข้อยังไม่ได้อ่าน';

$txt['ssi_not_direct'] = 'เข้าไม่ถึง SSI.php โดย URL โดยตรง; คุณอาจจะต้องใช้พาท (%s) หรือเพิ่ม ?ssi_function=something.';
$txt['ssi_session_broken'] = 'SSI.php ไม่สามารถโหลด session ได้! นี่อาจทำให้คุณมีปัญหากับการออกจากระบบและฟังก์ชั่นอื่นๆ - กรุณาตรวจสอบว่าคุณได้ include ไฟล์ SSI.php ในบรรทัดแรกของ script เว็บไซต์ของคุณ';

// Escape any single quotes in here twice.. 'it\'s' -> 'it\\\'s'.
$txt['preview_title'] = 'แสดงตัวอย่างกระทู้';
$txt['preview_fetch'] = 'แสดงตัวอย่างเป็นที่น่าพอใจ...';
$txt['preview_new'] = 'ข้อความใหม่';
$txt['error_while_submitting'] = 'ปรากฎข้อผิดพลาดตังต่อไปนี้ขณะส่งข้อความนี้:';

$txt['split_selected_posts'] = 'กระทู้ที่เลือก';
$txt['split_selected_posts_desc'] = 'กระทู้ข้างล่างจะเริ่มหัวข้อใหม่หลังจากแบ่ง';
$txt['split_reset_selection'] = 'คืนค่าตัวเลือก';

$txt['modify_cancel'] = 'ยกเลิก';
$txt['mark_read_short'] = 'มาร์คว่าอ่านแล้ว';

$txt['pm_short'] = 'ข้อความส่วนตัว';
$txt['hello_member_ndt'] = 'สวัสดี';

$txt['ajax_in_progress'] = 'กำลังโหลด...';
// Gallery Slideshow by smfclub.com .
$txt[9388] = 'Gallery Slideshow';
?>