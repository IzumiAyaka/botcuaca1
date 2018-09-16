<?php
/*
copyright @ medantechno.com
Modified @ Farzain - zFz
2017

*/

require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');

$channelAccessToken = 'cJ7eSDP0+c5FtrGfd5wbivuucvhG2xwytZK/Wanf77/LrkzWadi6UMSRnayOWLKUfWAop3GbI6pyzvrG72lwvuqDNUloLeDGf5TEGkTfQ7cAvUM9c0+fftC5KkjTbR6FsvvewwKIahCsKHpJAbW5QgdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '7e261b04c57fba0a4de4ba5e486f9014';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$type 		= $client->parseEvents()[0]['type'];

$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];

$profil = $client->profil($userId);

$pesan_datang = explode(" ", $message['text']);

$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}

#-------------------------[Function]-------------------------#
function cuaca($keyword) {
    $uri = "https://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg";

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = <div class="tab-content">

		<div class="tab-pane fade in active widget-cuaca" id="TabPaneCuaca1">	

						
			<div class="table-responsive">
			<table class="table table-hover table-striped table-prakicu-provinsi">
				<tbody><tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Banda Aceh&amp;AreaID=501397&amp;Prov=35">Banda Aceh</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan sedang-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Hujan Sedang</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan sedang-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Hujan Sedang</span></td>
					<td>22 - 33</td>
					<td>75 - 95</td>
				</tr>
				</tbody><thead>
				<tr>
					<th rowspan="2">Kota</th>
					<th colspan="2">Prakiraan Cuaca</th>
					<th rowspan="2">Suhu<br>( °C )</th>
					<th rowspan="2">Kelembaban<br>( % )</th>
				</tr>
				<tr>
					<th>Malam</th>
					<th>Dini Hari</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Denpasar&amp;AreaID=501164&amp;Prov=35">Denpasar</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 32</td>
					<td>65 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Serang&amp;AreaID=501174&amp;Prov=35">Serang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive loaded" alt=""><span class="tekscuaca">Cerah</span></td>
					<td>24 - 32</td>
					<td>50 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bengkulu&amp;AreaID=501178&amp;Prov=35">Bengkulu</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 32</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Yogyakarta&amp;AreaID=501190&amp;Prov=35">Yogyakarta</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 31</td>
					<td>50 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jakarta Pusat&amp;AreaID=501195&amp;Prov=35">Jakarta Pusat</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 33</td>
					<td>50 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Gorontalo&amp;AreaID=501197&amp;Prov=35">Gorontalo</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive loaded" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 33</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jambi&amp;AreaID=501205&amp;Prov=35">Jambi</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive loading" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>23 - 33</td>
					<td>60 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bandung&amp;AreaID=501212&amp;Prov=35">Bandung</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>19 - 31</td>
					<td>35 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Semarang&amp;AreaID=501262&amp;Prov=35">Semarang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 35</td>
					<td>40 - 80</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Surabaya&amp;AreaID=501306&amp;Prov=35">Surabaya</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					<td>22 - 33</td>
					<td>45 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pontianak&amp;AreaID=501315&amp;Prov=35">Pontianak</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					<td>23 - 33</td>
					<td>45 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Banjarmasin&amp;AreaID=501325&amp;Prov=35">Banjarmasin</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/asap-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Asap</span></td>
					<td>21 - 34</td>
					<td>40 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Palangkaraya&amp;AreaID=501342&amp;Prov=35">Palangkaraya</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 34</td>
					<td>50 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Samarinda&amp;AreaID=501354&amp;Prov=35">Samarinda</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>23 - 32</td>
					<td>50 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Tarakan&amp;AreaID=501360&amp;Prov=35">Tarakan</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan petir-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Petir</span></td>
					<td>25 - 32</td>
					<td>65 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pangkal Pinang&amp;AreaID=501365&amp;Prov=35">Pangkal Pinang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					<td>24 - 33</td>
					<td>50 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Tanjung Pinang&amp;AreaID=501371&amp;Prov=35">Tanjung Pinang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>25 - 32</td>
					<td>65 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bandar Lampung&amp;AreaID=501373&amp;Prov=35">Bandar Lampung</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 32</td>
					<td>60 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Ambon&amp;AreaID=501382&amp;Prov=35">Ambon</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 27</td>
					<td>80 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Ternate&amp;AreaID=501394&amp;Prov=35">Ternate</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 32</td>
					<td>70 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Mataram&amp;AreaID=501421&amp;Prov=35">Mataram</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>20 - 31</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Kupang&amp;AreaID=501434&amp;Prov=35">Kupang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 34</td>
					<td>40 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jayapura&amp;AreaID=501447&amp;Prov=35">Jayapura</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>25 - 28</td>
					<td>80 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Manokwari&amp;AreaID=501467&amp;Prov=35">Manokwari</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 31</td>
					<td>70 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pekanbaru&amp;AreaID=501478&amp;Prov=35">Pekanbaru</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					<td>23 - 27</td>
					<td>90 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Mamuju&amp;AreaID=501485&amp;Prov=35">Mamuju</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>25 - 31</td>
					<td>70 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Makassar&amp;AreaID=501495&amp;Prov=35">Makassar</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>23 - 33</td>
					<td>50 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Kendari&amp;AreaID=5013053&amp;Prov=35">Kendari</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>21 - 30</td>
					<td>65 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Manado&amp;AreaID=501534&amp;Prov=35">Manado</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 34</td>
					<td>30 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Padang&amp;AreaID=501545&amp;Prov=35">Padang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 25</td>
					<td>90 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Palembang&amp;AreaID=501568&amp;Prov=35">Palembang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					<td>23 - 34</td>
					<td>45 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Medan&amp;AreaID=501580&amp;Prov=35">Medan</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan petir-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Petir</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					<td>23 - 33</td>
					<td>75 - 100</td>
				</tr></tbody>
			</table>
			</div>
		</div>

		<div class="tab-pane fade in widget-cuaca" id="TabPaneCuaca2">	

						
			<div class="table-responsive">
			<table class="table table-hover table-striped table-prakicu-provinsi">
				<tbody><tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Banda Aceh&amp;AreaID=501397&amp;Prov=35">Banda Aceh</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					<td>23 - 31</td>
					<td>60 - 95</td>
				</tr>
				</tbody><thead>
				<tr>
					<th rowspan="2">Kota</th>
					<th colspan="4">Prakiraan Cuaca</th>
					<th rowspan="2">Suhu<br>( °C )</th>
					<th rowspan="2">Kelembaban<br>( % )</th>
				</tr>
				<tr>
					<th>Pagi</th>
					<th>Siang</th>
					<th>Malam</th>
					<th>Dini Hari</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Denpasar&amp;AreaID=501164&amp;Prov=35">Denpasar</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 32</td>
					<td>65 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Serang&amp;AreaID=501174&amp;Prov=35">Serang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 34</td>
					<td>45 - 75</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bengkulu&amp;AreaID=501178&amp;Prov=35">Bengkulu</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 32</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Yogyakarta&amp;AreaID=501190&amp;Prov=35">Yogyakarta</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 31</td>
					<td>50 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jakarta Pusat&amp;AreaID=501195&amp;Prov=35">Jakarta Pusat</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 33</td>
					<td>50 - 70</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Gorontalo&amp;AreaID=501197&amp;Prov=35">Gorontalo</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 33</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jambi&amp;AreaID=501205&amp;Prov=35">Jambi</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 33</td>
					<td>60 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bandung&amp;AreaID=501212&amp;Prov=35">Bandung</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>18 - 31</td>
					<td>35 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Semarang&amp;AreaID=501262&amp;Prov=35">Semarang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 35</td>
					<td>55 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Surabaya&amp;AreaID=501306&amp;Prov=35">Surabaya</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-am.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					<td>23 - 33</td>
					<td>45 - 80</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pontianak&amp;AreaID=501315&amp;Prov=35">Pontianak</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 33</td>
					<td>50 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Banjarmasin&amp;AreaID=501325&amp;Prov=35">Banjarmasin</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan sedang-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Sedang</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 32</td>
					<td>50 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Palangkaraya&amp;AreaID=501342&amp;Prov=35">Palangkaraya</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 33</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Samarinda&amp;AreaID=501354&amp;Prov=35">Samarinda</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 30</td>
					<td>65 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Tarakan&amp;AreaID=501360&amp;Prov=35">Tarakan</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 29</td>
					<td>80 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pangkal Pinang&amp;AreaID=501365&amp;Prov=35">Pangkal Pinang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>23 - 33</td>
					<td>50 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Tanjung Pinang&amp;AreaID=501371&amp;Prov=35">Tanjung Pinang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>25 - 32</td>
					<td>60 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bandar Lampung&amp;AreaID=501373&amp;Prov=35">Bandar Lampung</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>23 - 32</td>
					<td>60 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Ambon&amp;AreaID=501382&amp;Prov=35">Ambon</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					<td>23 - 30</td>
					<td>75 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Ternate&amp;AreaID=501394&amp;Prov=35">Ternate</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 31</td>
					<td>70 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Mataram&amp;AreaID=501421&amp;Prov=35">Mataram</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 30</td>
					<td>60 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Kupang&amp;AreaID=501434&amp;Prov=35">Kupang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 34</td>
					<td>50 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jayapura&amp;AreaID=501447&amp;Prov=35">Jayapura</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>23 - 31</td>
					<td>65 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Manokwari&amp;AreaID=501467&amp;Prov=35">Manokwari</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 31</td>
					<td>70 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pekanbaru&amp;AreaID=501478&amp;Prov=35">Pekanbaru</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>23 - 30</td>
					<td>60 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Mamuju&amp;AreaID=501485&amp;Prov=35">Mamuju</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan sedang-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Sedang</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 30</td>
					<td>70 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Makassar&amp;AreaID=501495&amp;Prov=35">Makassar</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 34</td>
					<td>50 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Kendari&amp;AreaID=5013053&amp;Prov=35">Kendari</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 32</td>
					<td>60 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Manado&amp;AreaID=501534&amp;Prov=35">Manado</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>21 - 32</td>
					<td>55 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Padang&amp;AreaID=501545&amp;Prov=35">Padang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 26</td>
					<td>85 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Palembang&amp;AreaID=501568&amp;Prov=35">Palembang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					<td>23 - 33</td>
					<td>45 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Medan&amp;AreaID=501580&amp;Prov=35">Medan</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan sedang-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Sedang</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 32</td>
					<td>70 - 95</td>
				</tr></tbody>
			</table>
			</div>
		</div>

		<div class="tab-pane fade in widget-cuaca" id="TabPaneCuaca3">	

						
			<div class="table-responsive">
			<table class="table table-hover table-striped table-prakicu-provinsi">
				<tbody><tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Banda Aceh&amp;AreaID=501397&amp;Prov=35">Banda Aceh</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-am.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan tebal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan Tebal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>20 - 29</td>
					<td>70 - 95</td>
				</tr>
				</tbody><thead>
				<tr>
					<th rowspan="2">Kota</th>
					<th colspan="4">Prakiraan Cuaca</th>
					<th rowspan="2">Suhu<br>( °C )</th>
					<th rowspan="2">Kelembaban<br>( % )</th>
				</tr>
				<tr>
					<th>Pagi</th>
					<th>Siang</th>
					<th>Malam</th>
					<th>Dini Hari</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Denpasar&amp;AreaID=501164&amp;Prov=35">Denpasar</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 28</td>
					<td>65 - 80</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Serang&amp;AreaID=501174&amp;Prov=35">Serang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>22 - 34</td>
					<td>50 - 80</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bengkulu&amp;AreaID=501178&amp;Prov=35">Bengkulu</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 32</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Yogyakarta&amp;AreaID=501190&amp;Prov=35">Yogyakarta</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 31</td>
					<td>50 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jakarta Pusat&amp;AreaID=501195&amp;Prov=35">Jakarta Pusat</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 33</td>
					<td>55 - 75</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Gorontalo&amp;AreaID=501197&amp;Prov=35">Gorontalo</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 33</td>
					<td>55 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jambi&amp;AreaID=501205&amp;Prov=35">Jambi</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan tebal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan Tebal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 31</td>
					<td>55 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bandung&amp;AreaID=501212&amp;Prov=35">Bandung</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>18 - 30</td>
					<td>35 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Semarang&amp;AreaID=501262&amp;Prov=35">Semarang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 35</td>
					<td>45 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Surabaya&amp;AreaID=501306&amp;Prov=35">Surabaya</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 33</td>
					<td>50 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pontianak&amp;AreaID=501315&amp;Prov=35">Pontianak</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan petir-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Petir</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 29</td>
					<td>75 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Banjarmasin&amp;AreaID=501325&amp;Prov=35">Banjarmasin</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/kabut-am.png" class="img-responsive" alt=""><span class="tekscuaca">Kabut</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan petir-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Petir</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 32</td>
					<td>65 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Palangkaraya&amp;AreaID=501342&amp;Prov=35">Palangkaraya</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 32</td>
					<td>60 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Samarinda&amp;AreaID=501354&amp;Prov=35">Samarinda</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/kabut-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Kabut</span></td>
					<td>23 - 27</td>
					<td>95 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Tarakan&amp;AreaID=501360&amp;Prov=35">Tarakan</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan tebal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan Tebal</span></td>
					<td>24 - 28</td>
					<td>80 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pangkal Pinang&amp;AreaID=501365&amp;Prov=35">Pangkal Pinang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 32</td>
					<td>55 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Tanjung Pinang&amp;AreaID=501371&amp;Prov=35">Tanjung Pinang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan tebal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan Tebal</span></td>
					<td>24 - 29</td>
					<td>80 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Bandar Lampung&amp;AreaID=501373&amp;Prov=35">Bandar Lampung</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 32</td>
					<td>60 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Ambon&amp;AreaID=501382&amp;Prov=35">Ambon</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>23 - 30</td>
					<td>70 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Ternate&amp;AreaID=501394&amp;Prov=35">Ternate</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 32</td>
					<td>70 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Mataram&amp;AreaID=501421&amp;Prov=35">Mataram</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					<td>22 - 32</td>
					<td>60 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Kupang&amp;AreaID=501434&amp;Prov=35">Kupang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah</span></td>
					<td>22 - 33</td>
					<td>45 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Jayapura&amp;AreaID=501447&amp;Prov=35">Jayapura</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>23 - 27</td>
					<td>85 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Manokwari&amp;AreaID=501467&amp;Prov=35">Manokwari</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>24 - 31</td>
					<td>70 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Pekanbaru&amp;AreaID=501478&amp;Prov=35">Pekanbaru</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 28</td>
					<td>80 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Mamuju&amp;AreaID=501485&amp;Prov=35">Mamuju</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					<td>24 - 31</td>
					<td>70 - 90</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Makassar&amp;AreaID=501495&amp;Prov=35">Makassar</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 32</td>
					<td>65 - 85</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Kendari&amp;AreaID=5013053&amp;Prov=35">Kendari</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>23 - 32</td>
					<td>60 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Manado&amp;AreaID=501534&amp;Prov=35">Manado</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/udara kabur-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Udara Kabur</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					<td>21 - 28</td>
					<td>70 - 100</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Padang&amp;AreaID=501545&amp;Prov=35">Padang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan lokal-am.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Lokal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>22 - 25</td>
					<td>85 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Palembang&amp;AreaID=501568&amp;Prov=35">Palembang</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan tebal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan Tebal</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan tebal-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan Tebal</span></td>
					<td>23 - 33</td>
					<td>45 - 95</td>
				</tr>
				<tr>
					<td><a href="prakiraan-cuaca.bmkg?Kota=Medan&amp;AreaID=501580&amp;Prov=35">Medan</a></td>
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/cerah berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Cerah Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-am.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/hujan ringan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Hujan Ringan</span></td>
					
					<td><img src="https://www.bmkg.go.id/asset/img/weather_icon/ID/berawan-pm.png" class="img-responsive" alt=""><span class="tekscuaca">Berawan</span></td>
					<td>24 - 32</td>
					<td>70 - 95</td>
				</tr></tbody>
			</table>
			</div>
		</div>

	</div>
}
#-------------------------[Function]-------------------------#

# require_once('./src/function/search-1.php');
# require_once('./src/function/download.php');
# require_once('./src/function/random.php');
# require_once('./src/function/search-2.php');
# require_once('./src/function/hard.php');

//show menu, saat join dan command /menu
if ($type == 'join' || $command == '/menu') {
    $text = "Halo Kak ^_^\nAku Bot Prediksi Cuaca, Kamu bisa mengetahui prediksi cuaca di daerah kamu sesuai dengan sumber BMKG";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}

//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/cuaca') {

        $result = cuaca($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }

}else if($message['type']=='sticker')
{	
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',									
										'text' => 'Makasih Kak Stikernya ^_^'										
									
									)
							)
						);
						
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();

    file_put_contents('./balasan.json', $result);


    $client->replyMessage($balas);
}
?>
