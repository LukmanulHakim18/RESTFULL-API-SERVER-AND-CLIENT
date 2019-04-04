# RESTFULL-API-SERVER-AND-CLIENT
toko_mobil_ali(Rest server)
Restfull API  ini menggunakan framework Codeigniter yang didalamnya terdapat method GET, POST, PUT, dan DELETE. 
keamanan yang digunakan yaitu menggunakan TOKEN-TOKO.
Method yang digunakan 
+ GET (digunakan untuk mengambil data) data yang dihasilkan berupa json dan memberikan tatus request '200 OK'
  - untuk mengambil seluruh data mobil 
  http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?TOKEN-TOKO=guest123
  - untuk mengambil seluruh data mobil berdasarkan brand
  http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?brand=honda&TOKEN-TOKO=guest123
  - untuk mengambil seluruh data mobil berdasarkan brand dan tipe
  http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?brand=honda&type=civic&TOKEN-TOKO=guest123
  - untuk mengambil data mobil berdasarkan id 
  http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?id=20&TOKEN-TOKO=guest123
      
+ POST (digunakan untuk menambahkan data) http://localhost/sprint-test-project/toko_mobil_ali/api/mobil 
  - Untuk menambahkan data dan harus sesuai dengan kebutuhan rest server 
  - Data yang dikirim adalah POST[no_rangka, no_polisi, merek, tipe, tahun, TOKEN-TOKO];
  - Memberikan respon pesan berupa json dan status request bila sukses '201 Created' dan json berisi pesan 'New car has been created'
+ PUT (digunakan untuk mengupdata data) http://localhost/sprint-test-project/toko_mobil_ali/api/mobil 
  - Untuk mengubah data dan harus sesuai dengan kebutuhan rest server 
  - Data yang dikirim adalah PUT[id, no_rangka, no_polisi, merek, tipe, tahun, TOKEN-TOKO];
  - Memberikan respon pesan berupa json dan status request bila sukses '200 OK' dan json berisi pesan 'Car has been Updated'
+ DELETE (digunakan untuk menghapus data) http://localhost/sprint-test-project/toko_mobil_ali/api/mobil 
  - Untuk menghapus data dan harus sesuai dengan kebutuhan rest server 
  - Data yang dikirim adalah DELETE[id, TOKEN-TOKO];
  - Memberikan respon pesan berupa json dan status request bila sukses '200 OK' dan json berisi pesan 'Car deleted'

client-front-end (Rest client)
Setelah membuat restfull API diatas maka saya mencoba untuk membuat rest client untuk mengakses API yang diberikan oleh rest server,
dengan restclient ini dapat dengan mudah melakukan CRUD terhadap server namun membutuhkan TOKEN-TOKO yang telah diberikan oleh server.
Adapun yang dapa dilakukan REST API Client Toko Mobil Pak Ali diantaranya
  + Pada halaman pertama langsung menampilkan seluruh data mobil yang terdapat di dalam database server.
  + Pada pencarian dapat dilakukan menggunakan brand dan tipe, namun jika ingin melakukan pencaarian tipe harus mengisikan brand.
  + Menambahkan data dengan menekan tombol Add maka form akan muncul sesuai dengan data yang harus diisikan secara valid.
  + Mengubah data dengan menekan tombol edit pada tiap row yang mana datanya akan diubah, lalu mengisikan form yang muncul secara valid.
  + Menghapus data dengan menekan  tombol edit pada tiap row yang mana datanya akan hapus.
   
Framework   
- https://github.com/bcit-ci/CodeIgniter/archive/3.1.10.zip

Library yang saya gunakan adalah:
- rest server https://github.com/chriskacerguis/codeigniter-restserver
- rest client http://docs.guzzlephp.org/en/stable/

Dummy data 
- https://www.mockaroo.com/
    
    
Pengembangan lanjutan dapat dilakukan dengan memberi keamanan yang lebih seperti AUTH  dan pemberian limiit akses tiap jamnya berdasarkan method yang di akses ke server.
