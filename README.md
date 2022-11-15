# MICRO's FRAMEWORK

<i>Framework/Template สำหรับการสร้าง Web Application ด้วยภาษา PHP ที่ช่วยให้สามารถขึ้นโปรเจคใหม่ได้แบบไวๆ เก็บไฟล์อย่างเป็นระเบียบ ลดความซ่้ำซ้อนของโค้ด โดยโครงสร้างไม่ซับซ้อนเกินไป คนอื่นใช้งานต่อง่ายๆ ด้วย Stack พื้นฐานๆ คือ</i>

- PHP
- MySQL (PDO)
- jQuery
- Bootstrap

# ตัวอย่างการใช้งานเบื้องต้น

- การเพิ่ม ไฟล์/หน้า ใหม่ เริ่มด้วยการ include layout มาครอบ บน-ล่าง และใส่เนื้อหาไปตรงกลางได้เลย เช่น

```
include('layouts/main_top.php');
    <div>
        <p>HELLO WORLD</p>
    </div>
include('layouts/main_bottom.php');
```

- เขียนแค่นี้ จะได้หน้าพร้อมใช้งานที่มี header+footer ของเว็บ พร้อม authentication, config, setting และ style ต่างๆ มาเลย สุดยอดดด!!

# เริ่มสร้างโปรเจคใหม่

1. โหลด templete เปล่าๆ ที่วางโครงสร้างพร้อมใช้ไว้แล้ว โดย Clone จาก Repo นี้ไปได้เลยครับ

```
git clone https://micro927@bitbucket.org/micro927/php_templete.git
```

2. เข้าไปยังโฟลเดอร์แล้วติดตั้ง packgage เริ่มต้น ด้วย Composer

```
composer install
```

3. กำหนดค่า ENV เริ่มต้น

```
# for database connect
DB_HOST = ''
DB_USERNAME = ''
DB_PASSWORD = ''
DB_NAME = ''

```

- หมายเหตุ: มีเตรียมไว้ให้ใน .env.example สามารถก๊อปแล้วเปลี่ยนชื่อเป็น .env บน Production server ได้เลย

# อธิบาย Folder ต่างๆ

## โฟลเดอร์ "layouts"

- เก็บ layout ซึ่งทำหน้าที่
  - include ไฟล์ต่างๆ จากโฟลเดอร์ "main" (อธิบายหัวข้อต่อไป)
  - include `php_`xxx.php จากโฟลเดอร์ "php" ของหน้านั้นๆ อัตโนมัติ (อธิบายต่อไป)
  - include Component ที่มีการใช้ซ้ำ จากโฟลเดอร์ "components"
- สร้าง layout ใหม่ได้ เช่น หน้า login ไม่ต้องการ navbar และไม่ต้อง verify ก็ทำ layouts/login_top.php,layouts/login_bottom.php ขึ้นมาใหม่ โดยไม่ต้องมี navbar และไม่ต้อง include main/verification.php

## โฟลเดอร์ "main"

- ประกอบด้วยไฟล์หลักๆ คือ
  - config\_... = set ค่าต่างๆ ตามชื่อไฟล์
  - accesscheck = set IP whitelist เพื่ออนุญาตให้เข้าใช้งาน
  - function = function ที่เขียนเองไว้ใช้
  - head = เก็บ tag: meta, link, script ต่างๆ เช่น bootstrap datatable jquery
  - initial = ตั้งค่าเริ่มต้น เช่น date_default_timezone_set
  - verification เช็คพวกการ login หรือสิทธ์ต่างๆ

## โฟลเดอร์ "php"

- เก็บไฟล์ที่เป็น code php ของไฟล์/หน้า เกือบทุกอันใน root folder ซึ่งทำการแยกไว้ เพื่อความคลีน
- ไฟล์ที่แยกไว้จะตั้งชื่อเดียวกันแต่เติม php\_ ไว้ข้างหน้า แล้วเก็บไว้ในโฟลเดอร์ "php" (เช่น หน้า `index.php` จะเก็บ php code ไว้ใน `php/php_index.php`)
- สร้างไฟล์แล้วเขียน code ได้เลย layout จะ include ให้เลยอัตโนมัติไม่ต้องทำอะไร
- สามารถเขียน PDO prepare statement ได้เลย เพราะ connect database ไว้แล้วจาก layout

## โฟลเดอร์ "components"

- เก็บ Component ที่ถูกใช้ซ้ำ (เช่น navbar, footer)

## โฟลเดอร์ "js"

- เก็บไฟล์ javascript
- script ที่ใช้ทุกหน้า ให้เขียนไว้ใน `main.js` เพราะจะถูก include ด้วย layout อัตโนมัติ
- สามารถสร้างไฟล์ js เพิ่มในนี้ แล้วเอาไปแนบเข้ากับไฟล์หลักได้เพื่อความคลีน หรือหากสะดวกพิมพ์ js ในไฟล์หลักก็ได้

## โฟลเดอร์ "css"

- เก็บไฟล์ css
- style ที่ใช้ทุกหน้า เช่น font ขนาดอักษร background ให้เขียนไว้ใน `main.css` เพราะจะถูก include ด้วย layout อัตโนมัติ
- bootstrap.css มีเพราะบาง project ต้อง custom theme สี/ปุ่ม หากไม่ต้องการ custom สามารถไปใช้จาก cdn ของ bootstrap จริงๆเลยก็ได้

## โฟลเดอร์ "plugins"

- เก็บ custom plugins/libary ที่ได้ใช้บ่อยๆ ใน project เช่น datatable (แบบ custom)

## โฟลเดอร์ "img"

- เก็บไฟล์รูปภาพ+โลโก้ .ico

## เพิ่มเติม: ENV ที่ต้องใช้

```
# for database connect
DB_HOST = ''
DB_USERNAME = ''
DB_PASSWORD = ''
DB_NAME = ''
```

- หมายเหตุ: มีเตรียมไว้ให้ใน env.example
