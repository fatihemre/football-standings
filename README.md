# Football Standings
Uygulama Türkiye Süper Liginin maçlarını ve puan durumunu örnek alarak tasarlandı. 
Herhangi başka bir lig de entegre edilebilir.

## Ekran Görüntüsü
![Screenshot](Ekran görüntüsü linki)

## Özellikler
* Belirlediğiniz bir futbol liginin verilerini girdiğiniz zaman fikstür ve puan durumu oluşturur.
* [GELECEK] Built-in bot yardımı ile istediğiniz liglerin verilerini otomatik olarak sisteme aktarabileceksiniz.
* [GELECEK] Birbirinden ayrı arayüz ve api ucu sayesinde her sisteme entegre edebilirsiniz.
* [GELECEK] Takım istatistiklerini görüntüleyebilirsiniz.
* [GELECEK] Verileri elle girebileceğiniz bir yönetim paneline sahip olabilirsiniz.

## Sistem Gereksinimleri
* PHP 8.0 veya üstü
* HTTP Server (Nginx tercih edilir.)
* MySQL
* Composer

## Kurulum
* Repo'yu klonlayın (`git clone https://github.com/fatihemre/football-standings`)
* Bağımlılıkları kurun. (`composer install --no-dev -o`)
* [GELECEK] Environment dosyasını oluşturun ve özelleştirin (`mv .env.example .env`)
* scheme klasöründeki mysql dump dosyalarını veritabanınıza import edin.
* [GELECEK] Yönetim panelini kullanarak verilerinizi ekleyin.
* Eğer localhostta kullanıyorsanız built-in server komutunu kullanarak uygulamayı çalıştırabilirsiniz. `sudo php -S localhost:80 -t $(pwd)/public server.php`


## TODO
- [ ] Tüm ayarlar config dosyasına taşınacak.
- [ ] Birden fazla lig eklenebilmesi ve switch edilebilmesi sağlanacak.
- [ ] Sezonların switch edilebilmesi sağlanacak.
- [ ] ORM ve Migration oluşturulacak.
- [ ] Uygulama api olarak tasarlanıp ayrı bir paket haline getirilecek.

## İletişim
* [Discord](https://discord.gg/2Ng5PGbrgd)