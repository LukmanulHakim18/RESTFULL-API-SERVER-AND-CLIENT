# RESTFULL-API-SERVER-AND-CLIENT
Restfull API yang saya buat ini menggunakan framework Codeigniter yang didalamnya terdapat methode GET, POST, PUT, dan DELETE. 
kemanan yang digunakan yaitu menggunakan TOKEN-TOKO

Methode yang digunakan 
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
  - data yang dikirim adalah POST[no_rangka, no_polisi, merek, tipe, tahun, TOKEN-TOKO];
  - memberikan respon pesan berupa json dan status request bila sukses '201 Created' dan json berisi pesan 'New cars has been created'
+ PUT (digunakan untuk mengupdata data) http://localhost/sprint-test-project/toko_mobil_ali/api/mobil 
  - Untuk mengubah data dan harus sesuai dengan kebutuhan rest server 
  - data yang dikirim adalah PUT[id, no_rangka, no_polisi, merek, tipe, tahun, TOKEN-TOKO];
  - memberikan respon pesan berupa json dan status request bila sukses '200 OK' dan json berisi pesan 'Cars has been Updated'
+ DELETE (digunakan untuk menghapus data) http://localhost/sprint-test-project/toko_mobil_ali/api/mobil 
  - Untuk menghapus data dan harus sesuai dengan kebutuhan rest server 
  - data yang dikirim adalah DELETE[id, TOKEN-TOKO];
  - memberikan respon pesan berupa json dan status request bila sukses '200 OK' dan json berisi pesan 'Car deleted'

   
   
    
    
