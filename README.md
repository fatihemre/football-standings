# Football Standings
Uygulama Türkiye Süper Liginin maçlarını ve puan durumunu örnek alarak tasarlandı. 
Herhangi başka bir lig de entegre edilebilir.

# Uygulamayı Ayağa Kaldırma
Built-in server kullanarak doğrudan çalıştırabilirsiniz. PHP v8.0 kullanıldı.

``
sudo php -S localhost:80 -t $(pwd)/public server.php
``

Yukarıdaki komut ile doğrudan localhost:80 ile çalışır duruma gelir.

* app/model/Database.php dosyasındaki veritabanı bağlantı ayarlarını değiştirin.
* scheme klasöründeki sql dosyalarını import edin.

# TODO
- [ ] Tüm ayarlar config dosyasına taşınacak.
- [ ] Birden fazla lig eklenebilmesi ve switch edilebilmesi sağlanacak.
- [ ] Sezonların switch edilebilmesi sağlanacak.
- [ ] ORM ve Migration oluşturulacak.
- [ ] Uygulama api olarak tasarlanıp ayrı bir paket haline getirilecek.