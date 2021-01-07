<?php
// Version: 1.1; ManageBoards

$txt[41] = 'จัดการบอร์ดและหมวดหมู่';
$txt[43] = 'ลำดับ';
$txt[44] = 'ชื่อเต็ม';
$txt[672] = 'นี่คือชื่อที่จะถูกแสดง';
$txt[677] = 'คุณสามารถแก้ไขบอร์ดที่นี่ การระบุชื่อผู้ดูแลหลายคนจะต้องระบุตามแบบ <i>&quot;username&quot;, &quot;username&quot;</i> (โปรดระวังเรื่องตัวอักษรใหญ่เล็กและชื่อที่ใช้แสดงผลด้วย!), สร้างบอร์ดใหม่ กดปุ่มเพิ่มบอร์ด, สร้างบอร์ดย่อยของบอร์ดปัจจุบัน เลือก "ย่อยของ..." จากดรอปดาวน์เมนูของลำดับ';
$txt['parent_members_only'] = 'สมาชิกทั้งหมด';
$txt['parent_guests_only'] = 'บุคคลทั่วไป';
$txt['catConfirm'] = 'คุณต้องการจะลบหมวดหมู่นี้?';
$txt['boardConfirm'] = 'คุณต้องการจะลบบอร์ดนี้?';

$txt['catEdit'] = 'แก้ไขหมวดหมู่';
$txt['boardsEdit'] = 'แก้ไขบอร์ด';
$txt['collapse_enable'] = 'สามารถย่อได้';
$txt['collapse_desc'] = 'อนุญาตให้สมาชิกย่อหมวดหมู่นี้ได้?';
$txt['catModify'] = '(แก้ไข)';

$txt['mboards_order_after'] = 'หลัง ';
$txt['mboards_order_inside'] = 'ด้านใน ';
$txt['mboards_order_first'] = 'ในอันดับแรก';

$txt['mboards_new_cat'] = 'สร้างหมวดหมู่ใหม่';
$txt['mboards_new_board'] = 'เพิ่มบอร์ด';
$txt['mboards_new_cat_name'] = 'หมวดหมู่ใหม่';
$txt['mboards_add_cat_button'] = 'เพิ่มหมวดหมู่';
$txt['mboards_new_board_name'] = 'บอร์ดใหม่';

$txt['mboards_name'] = 'ชื่อ';
$txt['mboards_modify'] = 'แก้ไข';
$txt['mboards_permissions'] = 'การอนุญาต';
// Don't use entities in the below string.
$txt['mboards_permissions_confirm'] = 'คุณแน่ใจหรือไม่ที่ต้องการเปลี่ยนบอร์ดนี้สู่การอนุญาตพื้นฐาน?';

$txt['mboards_delete_cat'] = 'ลบหมวดหมู่';
$txt['mboards_delete_board'] = 'ลบบอร์ด';

$txt['mboards_delete_cat_contains'] = 'การลบหมวดหมู่นี้ จะลบบอร์ดที่อยู่ภายในรวมทั้งหัวข้อทั้งหมด และไฟล์แนบในแต่ละบอร์ด';
$txt['mboards_delete_option1'] = 'ลบหมวดหมู่และบอร์ดที่อยู่ภายในนี้ทั้งหมด';
$txt['mboards_delete_option2'] = 'ลบหมวดหมู่และย้ายบอร์ดที่อยู่ภายในนี้ทั้งหมดไปสู่';
$txt['mboards_delete_error'] = 'ไม่มีหมวดหมู่ที่เลือก!';
$txt['mboards_delete_board_contains'] = 'การลบบอร์ดนี้จะทำให้บอร์ดย่อยเคลื่อนย้ายลงไปข้างล่าง, รวมทั้ง หัวข้อ กระทู้ ทั้งหมดและไฟล์แนบในแต่ละบอร์ด';
$txt['mboards_delete_board_option1'] = 'ลบบอร์ดและย้ายบอร์ดย่อยเพื่อเลื่อนระดับบอร์ดขึ้นมา';
$txt['mboards_delete_board_option2'] = 'ลบบอร์ดและย้ายบอร์ดย่อยทั้งหมดไปสู่';
$txt['mboards_delete_board_error'] = 'ไม่มีบอร์ดที่เลือก!';
$txt['mboards_delete_what_do'] = 'โปรดเลือกมีอะไรที่คุณอยากทำกับบอร์ดเหล่านี้';
$txt['mboards_delete_confirm'] = 'ยืนยัน';
$txt['mboards_delete_cancel'] = 'ยกเลิก';

$txt['mboards_category'] = 'หมวดหมู่';
$txt['mboards_description'] = 'คำอธิบายของบอร์ด';
$txt['mboards_description_desc'] = 'คำอธิบายบอร์ดของคุณโดยย่อ';
$txt['mboards_groups'] = 'กลุ่มที่อนุญาต';
$txt['mboards_groups_desc'] = 'กลุ่มที่อนุญาตให้เข้าไปใช้งานในบอร์ดนี้';
$txt['mboards_groups_post_group'] = 'กลุ่มนี้คือกลุ่มหัวข้อ';
$txt['mboards_permissions_title'] = 'การเข้าถึงบอร์ด';
$txt['mboards_permissions_desc'] = 'เลือกการจำกัดสำหรับบอร์ดนี้ การจำกัดเหล่านี้ไม่รวมถึงผู้ดูแลบอร์ดและผู้ดูแลระบบ';
$txt['mboards_moderators'] = 'ผู้ดูแล';
$txt['mboards_moderators_desc'] = 'สมาชิกที่มีสิทธิพิเศษในบอร์ด';
$txt['mboards_count_posts'] = 'นับกระทู้';
$txt['mboards_count_posts_desc'] = 'ทำให้การตอบกระทู้และตั้งหัวข้อใหม่ เพิ่มจำนวนนับกระทู้ของสมาชิก';
$txt['mboards_unchanged'] = 'ยกเลิกการเปลี่ยนแปลง';
$txt['mboards_theme'] = 'ธีมของบอร์ด';
$txt['mboards_theme_desc'] = 'ในส่วนนี้จะอนุญาตให้คุณเปลี่ยนรูปแบบของฟอรั่มได้เฉพาะภายในบอร์ดนี้';
$txt['mboards_theme_default'] = '(ค่าปกติของฟอรั่มโดยรวม)';
$txt['mboards_override_theme'] = ' ใช้ธีมนี้ทุกคน';
$txt['mboards_override_theme_desc'] = 'ใช้ธีมของบอร์ดนี้ แม้ว่าสมาชิกจะไม่ได้เลือกธีม';

$txt['mboards_order_before'] = 'ก่อน';
$txt['mboards_order_child_of'] = 'ย่อยของ';
$txt['mboards_order_in_category'] = 'ในหมวดหมู่';
$txt['mboards_current_position'] = 'ตำแหน่งปัจจุบัน';
$txt['no_valid_parent'] = 'บอร์ด %s ไม่มีบอร์ดหลัก ใช้ฟังค์ชั่น \'ค้นและซ่อมแซมปัญหา\' เพื่อแก้ไข';

$txt['mboards_settings_desc'] = 'แก้ไขทั่วไปการตั้งค่าบอร์ดและหมวดหมู่';
$txt['groups_manage_boards'] = 'กลุ่มสมาชิกที่อนุญาตจัดการบอร์ดและหมวดหมู่';
$txt['mboards_settings_submit'] = 'บันทึก';
$txt['recycle_enable'] = 'เปิดการรีไซเคิลหัวข้อที่ถูกลบ';
$txt['recycle_board'] = 'บอร์ดสำหรับหัวข้อที่ถูกลบ';
$txt['countChildPosts'] = 'นับกระทู้รวมทั้งบอร์ดหลักและบอร์ดย่อย';

$txt['mboards_select_destination'] = 'เลือกบอร์ดปลายทาง \'<b>%1$s</b>\'';
$txt['mboards_cancel_moving'] = 'ยกเลิกการย้าย';
$txt['mboards_move'] = 'ย้าย';

?>