
# Mivento-task

## db/Db.php

- Veri tabanı bağlantısını sağlar
- Gerekli olan veriyi parametreye göre şartlandırır ve geriye döndürür
- Kayıt edilecek olan veriyi alır ve veritabanına kaydeder

## utils/fileUpload.php
- gönderilen dosyayı alır ve 'uploads' klasörüne yükler.

## utils/uuid.php
- bir random string döndürür ve bu stringi istediğiniz işlem için kullanabilirsiniz. ben dosyanın ismini unique yapmak için kullandım.

## php/writeToDatabase.php
- file uploaddan gelen dosya yolunu alır ve dosyayı okur.
- dosyanın her satırını formatlar ve while içerisinde her birini döner.
- gerekli kontroller yapıldıktan sonra şartlar sağlanıyorsa veri tabanına ekler ve success mesajı ile birlikte datayı döner.
- şartlar sağlanmıyorsa error mesajı ile birlikte ilgili datayı döner.

## utils/app.php
- ilgili kısımlar çalıştırılır.
