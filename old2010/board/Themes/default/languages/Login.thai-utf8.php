<?php
// Version: 1.1.2; Login

$txt[37] = 'คุณจะต้องใส่ชื่อผู้ใช้งานของคุณลงในช่องชื่อผู้ใช้งาน';
$txt[38] = 'ช่องรหัสผ่านยังไม่ได้ใส่';
$txt[39] = 'รหัสผ่านไม่ถูกต้อง';
$txt[98] = 'เลือกชื่อผู้ใช้ (กรุณาใช้ภาษาอังกฤษ)';
$txt[155] = 'โหมดบำรุงรักษา';
$txt[245] = 'การสมัครสมาชิกเรียบร้อย';
$txt[431] = 'ตอนนี้คุณได้เป็นสมาชิกเรียบร้อยแล้ว';
// Use numeric entities in the below string.
$txt[492] = 'และรหัสผ่านของคุณคือ';
$txt[500] = 'โปรดระบุอีเมล์ที่ถูกต้อง, %s';
$txt[517] = 'ข้อมูลสำคัญของสมาชิก';
$txt[520] = 'ใช้เพื่อระบุตัวตนของคุณ กรุณาใช้เฉพาะภาษาอังกฤษและตัวเลขเท่านั้น คุณสามารถใช้ตัวอักษรพิเศษและภาษาไทยได้หลังจากเข้าสู่ระบบโดยเปลี่ยนในส่วนข้อมูลส่วนตัวของคุณ';
$txt[585] = 'ตกลง';
$txt[586] = 'ไม่ตกลง';
$txt[633] = 'ระวัง!';
$txt[634] = 'สมาชิกเท่านั้นที่จะเข้าใช้งานส่วนนี้ได้';
$txt[635] = 'โปรดเข้าสู่ระบบ หรือ';
$txt[636] = 'คลิกที่นี่';
$txt[637] = 'เพื่อจะทำการสมัครสมาชิกกับ ' . $context['forum_name'] . '.';
// Use numeric entities in the below two strings.
$txt[701] = 'คุณสามารถเปลี่ยนแปลงมันหลังจากที่คุณได้เข้าสู่ระบบแล้ว โดยไปยังหน้ารายละเอียด (profile)';
$txt[719] = 'ชื่อผู้ใช้งานของคุณคือ: ';
$txt[730] = 'อีเมล์นั้น (%s) ถูกใช้งานโดยสมาชิกที่สมัครสมาชิกแล้ว ถ้าคุณคิดว่านี่เป็นความผิดพลาด กรุณากลับไปที่หน้าในการเข้าสู่ระบบ แล้วเลือกให้ส่งรหัสผ่านไปยังที่อยู่นั้น';

$txt['login_hash_error'] = 'เพื่อความปลอดภัย รหัสผ่านที่คุณใช้อยู่ ควรจะเปลี่ยนใหม่ กรุณากรอกรหัสผ่านอีกครั้ง';

$txt['register_age_confirmation'] = 'ฉันอายุน้อยกว่า %d ปี';

// Use numeric entities in the below six strings.
$txt['register_subject'] = 'ยินดีต้อนรับสู่ ' . $context['forum_name'];

// For the below three messages, %1$s is the display name, %2$s is the username, %3$s is the password, %4$s is the activation code, and %5$s is the activation link (the last two are only for activation.)
$txt['register_immediate_message'] = 'ขณะนี้ คุณได้ลงทะเบียนผู้ใช้งานที่ ' . $context['forum_name'] . ', %1$s!' . "\n\n" . 'ชื่อผู้ใช้งานของคุณคือ %2$s และรหัสผ่านคือ %3$s' . "\n\n" . 'คุณสามารถเปลี่ยนรหัสผ่านได้หลังจากที่คุณเข้าสู่ระบบ โดยเข้าไปที่ข้อมูลส่วนตัว หรือเข้ามาที่หน้านี้หลังจากเข้าสู่ระบบ:' . "\n\n" . $scripturl . '?action=profile' . "\n\n" . $txt[130];
$txt['register_activate_message'] = 'ขณะนี้ คุณได้ลงทะเบียนผู้ใช้งานที่ ' . $context['forum_name'] . ', %1$s!' . "\n\n" . 'ชื่อผู้ใช้งานของคุณคือ %2$s และรหัสผ่านคือ %3$s (สามารถเปลี่ยนได้หลังจากนี้)' . "\n\n" . 'ก่อนเข้าสู่ระบบ คุณต้องยืนยันการใช้งานก่อน โดยคลิกที่ลิ้งค์นี้:' . "\n\n" . '%5$s' . "\n\n" . 'ถ้าคุณมีปัญหายืนยันการใช้งาน ให้ใช้รหัส "%4$s".' . "\n\n" . $txt[130];
$txt['register_pending_message'] = 'ถ้าคุณต้องการลงทะเบียนที่ ' . $context['forum_name'] . ' คุณจะได้รับ, %1$s.' . "\n\n" . 'ชื่อที่ลงทะเบียนผู้ใช้งานคือ %2$s และรหัสผ่านคือ %3$s.' . "\n\n" . 'ก่อนเข้าสู่ระบบและเริ่มต้นการใช้งานฟอรั่ม, คุณต้องยืนยันการใช้งานก่อน โดยคุณจะได้รับอีเมล์จากที่นี่' . "\n\n" . $txt[130];

// For the below two messages, %1$s is the user's display name, %2$s is their username, %3$s is the activation code, and %4$s is the activation link (the last two are only for activation.)
$txt['resend_activate_message'] = 'ขณะนี้ คุณได้ลงทะเบียนผู้ใช้งานที่ ' . $context['forum_name'] . ', %1$s!' . "\n\n" . 'ชื่อผู้ใช้งานของคุณคือ "%2$s".' . "\n\n" . 'ก่อนเข้าสู่ระบบ คุณต้องยืนยันการใช้งานก่อน โดยคลิกที่ลิ้งค์นี้:' . "\n\n" . '%4$s' . "\n\n" . 'ถ้าคุณมีปัญหายืนยันการใช้งาน ให้ใช้รหัส "%3$s".' . "\n\n" . $txt[130];
$txt['resend_pending_message'] = 'ถ้าคุณต้องการลงทะเบียนที่ ' . $context['forum_name'] . ' คุณจะได้รับ, %1$s.' . "\n\n" . 'ชื่อที่ลงทะเบียนผู้ใช้งานคือ %2$s.' . "\n\n" . 'ก่อนเข้าสู่ระบบและเริ่มต้นการใช้งานฟอรั่ม, คุณต้องยืนยันการใช้งานก่อน โดยคุณจะได้รับอีเมล์จากที่นี่' . "\n\n" . $txt[130];

$txt['ban_register_prohibited'] = 'คุณไม่ได้รับอนุญาตให้ลงทะเบียน';
$txt['under_age_registration_prohibited'] = 'ขออภัย ผู้ใช้งานที่อายุตํ่ากว่า %d ปี ไม่อนุญาตให้ลงทะเบียนในฟอรั่มนี้';

$txt['activate_account'] = 'ตอบรับการเป็นสมาชิก';
$txt['activate_success'] = 'ชื่อที่คุณลงทะเบียนเอาไว้สามารถใช้ในระบบได้แล้ว ตอนนี้คุณสามารถเข้าสู่ระบบได้แล้ว';
$txt['activate_not_completed1'] = 'อีเมล์ของคุณต้องสามารถใช้งานได้จริง และคุณต้องได้รับอีเมล์ตอบรับก่อนถึงจะสามารถเข้าระบบได้';
$txt['activate_not_completed2'] = 'ต้องการให้ส่งการตอบรับสมาชิกไปที่อีเมล์อื่นด้วยหรือไม่?';
$txt['activate_after_registration'] = 'ขอบคุณที่ลงทะเบียน. คุณจะได้รับอีเมล์พร้อมกับลิ้งค์เพื่อเริ่มต้นใช้งานชื่อผู้ใช้งานของคุณ';
$txt['invalid_userid'] = 'ไม่มีชื่อผู้ใช้งานนี้';
$txt['invalid_activation_code'] = 'รหัสยืนยันการใช้งานไม่ถูกต้อง';
$txt['invalid_activation_username'] = 'ชื่อผู้ใช้งานหรืออีเมล์';
$txt['invalid_activation_new'] = 'ถ้าคุณลงทะเบียนโดยใช้อีเมล์ผิด, พิมพ์อีเมล์ใหม่และรหัสผ่านของคุณที่นี่';
$txt['invalid_activation_new_email'] = 'อีเมล์ใหม่';
$txt['invalid_activation_password'] = 'รหัสผ่านเก่า';
$txt['invalid_activation_resend'] = 'ส่งรหัสยืนยันการใช้งานอีกครั้ง';
$txt['invalid_activation_known'] = 'ถ้าคุณรู้รหัสยืนยันการใช้งานแล้ว, กรุณาพิมพ์ที่นี่';
$txt['invalid_activation_retry'] = 'กรุณาใส่รหัสยืนยันการใช้งานของคุณลงในนี้';
$txt['invalid_activation_submit'] = 'ยืนยันการใช้งาน';

$txt['coppa_not_completed1'] = 'ผู้ดูแลระบบยังไม่ได้รับการยินยอมจาก พ่อแม่/ผู้ปกครอง สำหรับชื่อผู้ใช้งานของคุณ';
$txt['coppa_not_completed2'] = 'ต้องการรายละเอียดมากกว่านี้?';

$txt['awaiting_delete_account'] = 'ชื่อผู้ใช้งานของคุณกำลังจะถูกลบ!<br />ถ้าคุณต้องการเก็บชื่อผู้ใช้งานนี้ไว้ กรุณาตรวจสอบ &quot;ยืนยันการใช้งานอีกครั้ง&quot; และเข้าสู่ระบบ';
$txt['undelete_account'] = 'ยืนยันการใช้งานอีกครั้ง';

$txt['change_email_success'] = 'อีเมล์ของคุณได้ถูกเปลี่ยนแปลง และได้ส่งอีเมล์ยืนยันการใช้งานใหม่';
$txt['resend_email_success'] = 'ส่งอีเมล์ยืนยันการใช้งานเรียบร้อยแล้ว';
// Use numeric entities in the below three strings.
$txt['change_password'] = 'รายละเอียดรหัสผ่านใหม่';
$txt['change_password_1'] = 'รายละเอียดการเข้าใช้ของคุณที่';
$txt['change_password_2'] = 'ถ้าได้ถูกเปลี่ยนแปลงและรหัสผ่านของคุณถูกคืนค่า ข้างล่างนี้คือรายละเอียดการเข้าใช้ใหม่ของคุณ.';

$txt['maintenance3'] = 'ขณะนี้ระบบกำลังอยู่ในโหมดบำรุงรักษา';

// These two are used as a javascript alert; please use international characters directly, not as entities.
$txt['register_agree'] = 'กรุณาอ่านเงื่อนไขก่อน ตกลงเป็นสมาชิก';
$txt['register_passwords_differ_js'] = 'คุณกรอกรหัสผ่านทั้งสองครั้งไม่เหมือนกัน!';

$txt['approval_after_registration'] = 'ขอบคุณที่ลงทะเบียนกับทางเว็บ ผู้ดูแลระบบจะต้องตอบรับการลงทะเบียนก่อนที่ชื่อที่ลงทะเบียนไว้จะใช้งานได้ คุณจะได้รับอีเมล์ตอบรับจากทางผู้ดูแลระบบในเร็วๆ นี้';

$txt['admin_settings_desc'] = 'ที่นี่คุณสามารถเปลี่ยนการตั้งค่าเกี่ยวกับการลงทะเบียนของสมาชิกใหม่';

$txt['admin_setting_registration_method'] = 'วิธีการลงทะเบียนสำหรับสมาชิกใหม่';
$txt['admin_setting_registration_disabled'] = 'ปิดการลงทะเบียน';
$txt['admin_setting_registration_standard'] = 'ลงทะเบียนใช้งานทันที';
$txt['admin_setting_registration_activate'] = 'ยืนยันการใช้งาน';
$txt['admin_setting_registration_approval'] = 'อนุมัติสมาชิก';
$txt['admin_setting_notify_new_registration'] = 'แจ้งเตือนผู้ดูแลระบบเมื่อมีสมาชิกสมัครใหม่';
$txt['admin_setting_send_welcomeEmail'] = 'ส่งอีเมล์ต้อนรับให้สมาชิกใหม่';

$txt['admin_setting_password_strength'] = 'ต้องการรหัสผ่านที่คาดเดายากกว่านี้';
$txt['admin_setting_password_strength_low'] = 'อย่างตํ่า - 4 ตัวอักษรขึ้นไป';
$txt['admin_setting_password_strength_medium'] = 'ปานกลาง - ต้องไม่ซํ้ากับชื่อผู้ใช้งาน';
$txt['admin_setting_password_strength_high'] = 'ขั้นสูง - ตัวอักษรต้องแตกต่างกัน';

$txt['admin_setting_image_verification_type'] = 'การจำลองความซับซ้อน เพื่อตรวจสอบความเป็นจริงของรูปภาพ';
$txt['admin_setting_image_verification_type_desc'] = 'รูปภาพเชิงซ้อนเพื่อไม่ให้บอทผ่านเข้าไป';
$txt['admin_setting_image_verification_off'] = 'ปิดการทำงาน';
$txt['admin_setting_image_verification_vsimple'] = 'ง่ายมาก - ข้อความบนรปภาพ';
$txt['admin_setting_image_verification_simple'] = 'ง่าย - ใช้ตัวอักษรสลับสี ไม่มีสิ่งรบกวน';
$txt['admin_setting_image_verification_medium'] = 'ปานกลาง - ใช้ตัวอักษรสลับสี มีสิ่งรบกวน';
$txt['admin_setting_image_verification_high'] = 'ยาก - ตัวอักษรสลับมุม, มีสิ่งรบกวนมาก';
$txt['admin_setting_image_verification_sample'] = 'ตัวอย่าง';
$txt['admin_setting_image_verification_nogd'] = '<b>บันทึก:</b> เครื่องเซิร์ฟเวอร์นี้ไม่มี GD ไลบารี่ การตั้งค่าความซับซ้อนจะไม่มีผลกระทบ';

$txt['admin_setting_coppaAge'] = 'กำหนดอายุลงทะเบียนผู้ใช้งาน';
$txt['admin_setting_coppaAge_desc'] = '(0 ไม่ใช้งาน)';
$txt['admin_setting_coppaType'] = 'กำหนดอายุลงทะเบียนผู้ใช้งานตํ่าสุดข้างล่างนี้';
$txt['admin_setting_coppaType_reject'] = 'ปฏิเสธการลงทะเบียน';
$txt['admin_setting_coppaType_approval'] = 'ต้องการให้ พ่อแม่/ผู้ปกครอง อนุมัติ';
$txt['admin_setting_coppaPost'] = 'ที่อยู่ทางไปรษณีย์ ถึงผู้รับอนุมัติ';
$txt['admin_setting_coppaPost_desc'] = 'สถานที่ในการตอบรับการจำกัดอายุ';
$txt['admin_setting_coppaFax'] = 'หมายเลขแฟกซ์ ถึงผู้รับอนุมัติ';
$txt['admin_setting_coppaPhone'] = 'หมายเลขโทรศัพท์ติดต่อ สำหรับพ่อแม่ที่ต้องการทราบเกี่ยวกับการจำกัดอายุ';
$txt['admin_setting_coppa_require_contact'] = 'ถ้าต้องการให้ พ่อแม่/ผู้ปกครอง ติดต่อคุณต้องกรอกที่อยู่หรือแฟกซ์';

$txt['admin_register'] = 'ลงทะเบียนสมัครสมาชิกใหม่';
$txt['admin_register_desc'] = 'ขณะนี้คุณสามารถลงทะเบียนสมาชิกใหม่แทนได้ โดยให้อีเมล์รายละเอียดผู้ที่ต้องการจะสมัครไปยังผู้ดูแลระบบ';
$txt['admin_register_username'] = 'ชื่อสมาชิกใหม่';
$txt['admin_register_email'] = 'อีเมล์';
$txt['admin_register_password'] = 'รหัสผ่าน';
$txt['admin_register_username_desc'] = 'ชื่อผู้ใช้งานสำหรับสมาชิกใหม่';
$txt['admin_register_email_desc'] = 'อีเมล์ของสมาชิกของสมาชิกใหม่';
$txt['admin_register_password_desc'] = 'รหัสผ่านสำหรับสมาชิกใหม่';
$txt['admin_register_email_detail'] = 'ส่งอีเมล์ รหัสผ่านให้สมาชิก';
$txt['admin_register_email_detail_desc'] = 'ต้องใส่อีเมล์แม้ว่าจะไม่ตรวจ';
$txt['admin_register_email_activate'] = 'สมาชิกต้องตอบรับยืนยันการใช้งานก่อน';
$txt['admin_register_group'] = 'กลุ่มสมาชิกหลัก';
$txt['admin_register_group_desc'] = 'สมาชิกใหม่ของกลุ่มสมาชิกหลักจะเป็นของ';
$txt['admin_register_group_none'] = '(ไม่มีกลุ่มสมาชิกหลัก)';
$txt['admin_register_done'] = 'สมาชิก %s ได้ลงทะเบียนเสร็จสิ้น!';

$txt['admin_browse_register_new'] = 'ชื่อสมาชิกลงทะเบียนใหม่';

// Use numeric entities in the below three strings.
$txt['admin_notify_subject'] = 'มีการลงทะเบียนสมาชิกใหม่';
$txt['admin_notify_profile'] = '%s ถ้าเพิ่งลงทะเบียนเป็นสมาชิกใหม่ของฟอรั่มคุณ คลิกที่ลิ้งค์ข้างล่างนี้เพื่อดูข้อมูล';
$txt['admin_notify_approval'] = 'ก่อนที่สมาชิกนี้จะตั้ง/ตอบกระทู้ พวกเขาต้องได้อนุมัติการใช้งานก่อน คลิกที่ลิ้งค์นี้เพื่อเข้าไปอนุมัติ';

$txt['coppa_title'] = 'จำกัดอายุผู้ใช้งานฟอรั่ม';
$txt['coppa_after_registration'] = 'ขอบคุณสำหรับการลงทะเบียนกับ ' . $context['forum_name'] . '.<br /><br />ก่อนที่คุณจะใช้งาน คุณต้องได้รับการอนุญาตจากพ่อแม่หรือผู้ปกครอง เพราะคุณอายุตํ่ากว่า {MINIMUM_AGE}, มันคือความต้องการทางกฏหมาย
	เพื่อยืนยันชื่อผู้ใช้งานของคุณ ให้คุณสั่งพิมพ์แบบฟอร์มด้านล่างนี้:';
$txt['coppa_form_link_popup'] = 'โหลดแบบฟอร์มจากหน้าต่างใหม่';
$txt['coppa_form_link_download'] = 'ดาวน์โหลดไฟล์แบบฟอร์ม';
$txt['coppa_send_to_one_option'] = 'แล้วให้ พ่อแม่/ผู้ปกครอง กรอกให้เรียบร้อย ส่งโดย:';
$txt['coppa_send_to_two_options'] = 'แล้วให้ พ่อแม่/ผู้ปกครอง กรอกให้เรียบร้อย ส่งมาทางใดทางหนึ่ง:';
$txt['coppa_send_by_post'] = 'ที่อยู่ทางไปรษณีย์ดังต่อไปนี้:';
$txt['coppa_send_by_fax'] = 'แฟกซ์ตามเบอร์นี้:';
$txt['coppa_send_by_phone'] = 'ทางเลือก, หรือติดต่อกับผู้ดูแลระบบได้ที่เบอร์โทรศัพท์ {PHONE_NUMBER}.';

$txt['coppa_form_title'] = 'รูปแบบการอนุญาตกำหรับลงทะเบียนที่ ' . $context['forum_name'];
$txt['coppa_form_address'] = 'ที่อยู่';
$txt['coppa_form_date'] = 'วัน';
$txt['coppa_form_body'] = 'ฉัน {PARENT_NAME},<br /><br />ให้การอนุญาตสำหรับ {CHILD_NAME} (child name) เพื่อให้ลงทะเบียนเป็นสมาชิกของฟอรั่ม: ' . $context['forum_name'] . ', ด้วยชื่อผู้ใช้งาน: {USER_NAME}.<br /><br />ฉันให้คำแนะนำที่กรอกโดย {USER_NAME} อาจจะถูกคนอื่นนำไปใช้ในฟอรั่ม<br /><br />ลงชื่อ:<br />{PARENT_NAME} (พ่อแม่/ผู้ปกครอง).';

$txt['visual_verification_label'] = 'จำลองการตรวจสอบ';
$txt['visual_verification_description'] = 'พิมพ์ตัวอักษรที่แสดงในรูปภาพ';
$txt['visual_verification_sound'] = 'ฟังตัวอักษร';
$txt['visual_verification_sound_again'] = 'เล่นอีกครั้ง';
$txt['visual_verification_sound_close'] = 'ปิดหน้าต่าง';
$txt['visual_verification_request_new'] = 'ต้องการรูปภาพอื่น';
$txt['visual_verification_sound_direct'] = 'มีปัญหาการได้ยินสิ่งนี้ไหม? พยายามเชื่อมต่อมัน';

?>