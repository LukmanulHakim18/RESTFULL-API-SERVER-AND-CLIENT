# RESTFULL-API-SERVER-AND-CLIENT
Restfull API yang saya buat ini menggunakan framework Codeigniter yang didalamnya terdapat methode GET, POST, PUT, dan DELETE. 
kemanan yang digunakan yaitu menggunakan TOKEN-TOKO

Methode yang digunakan 
  +GET 
    -untuk mengambil seluruh data mobil 
      http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?TOKEN-TOKO=*guest123*
    -untuk mengambil seluruh data mobil berdasarkan brand
      http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?brand=*honda*&TOKEN-TOKO=*guest123*
    -untuk mengambil seluruh data mobil berdasarkan brand dan tipe
      http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?brand=*honda*&type=*civic*&TOKEN-TOKO=*guest123*
    -untuk mengambil data mobil berdasarkan id 
      http://localhost/sprint-test-project/toko_mobil_ali/api/mobil?id=*20*&TOKEN-TOKO=*guest123*
