<?php

use \App\Models\Chat;

$salom = ["Sava", "Qaleysiz", "Ne ko'rinmi ketdiz!", "Ee jigar bomisiz!", "Oooo! Ayonoshkani o'rtog'i keldiyu!",
"Bolla, qizla bitta fikr bor!", "Salom bergan kishini urib sindir tishini. Shu gapi qaysi axmoq etdi", "Salomlar bo'sin!",
"Voy bu kim bo'ldi yana!", "Va aleykum assalom bo'tam, uy ichila tinchmi", "Ee keling, kebqoling!", "Qalesiz! Grupamiz yoqdimi!", "Tekinakan db salom bervurasizmi endi, qalesiz o'zi tinchmi! ๐",
"Sizga bitta ish bor, lichkaga o'ting...", "Salom! Nik daxshatu a!", "Qalesiz. Vo, profilizdegi rasmizga gap yo'q! Maniki qale?!", "Salom, ismiz  nima?", 
"Va aleykum assalom! Nima gapla, nikiz o'zgaribdimi!", "Salom. Faqat va faqat sizga besh! Qoganlaga olti! ๐",
"Hello! Inglizcha gaplashishi bilaman! Mayli manga o'zbecha yozvuring๐", "๐Salom! Bugun siz uchun zo'r kun bo'ladi!", 
"Hammaga salom! Bugun boshqacha kuna!", "Bonjug'! Fransuzchayam o'rgandim! Siz bilasizmi?", "Assalomu aleykoooom boy ota!", "Ehe keb qoling, anu gap nima bo'ldi?",
"Salom. Sizi kimgadir o'xshatvommande", "Qaleeeey! Kimdir yurakdan urdimi diymana!", "Salom berdik! Do'stim muddaoga o'ting!", "Xush ko'rdik, keling!",
"Salom! Stiker tashamen faqat!", "Eheeee... Quyosh qaysi tarafdan chiqdi! Bomisiz!", "Keling, keling... Biz hammamiz sizi kutvotudik",
"Iye! Kutilmagan mehmon!","Salom! Yuragizni sevgi-muhabbat qoplaganda to'g'ri shu yerga kevuring!๐",  "Va aleykum! Qani nima gaplar bo'tam!", "'Qale endi! Adajon, oyijonla sog'-salomatmi! Umrlari uzo bo'sin!'", 
"Yaxshimisiz, rahmat manam yaxshiman!", "Iya, iya... Salom berdiik!", "Ohoo! Grupamizi gullatadganla kelishdiyu!", 
"Guten Morgan! Nemis tiliniyam o'rganvomman! Qalesila!", "Iye Farosatxon, keling!", "Ana, uyushgan jinoyatchila boshlig'i keldi!", 
"Qalesiz, onlayn bo'ganiz bilan tabriklimiz!", "Yaxshimisiz, bola chaqa, molxona, uy ichila tinchmi!", "Keling, kamro nos  cheksez bo'midimi!", "Vuuuuy! Grupani paxani keldiyu!",
"Yaxshimisiz, tinchmi... Lichkada yomonam gaplashib qo'yarkansiza e!", "Nossi tuflab gapiring", "Salom. Diqqat savol, cho'ntagimda nima bor!",
"Gar saloming bo'lmasa ikki yamlab bir yutib, tupurib tashardim! ๐"];
//Salomlashish yakunlandi


$kimman = ["E gap yo'q, sizdan zo'ri yo'q!", "Kimligizi bilmismi? Qo'yinge! Mana man Erkatoyman!", "Baqaloq!", "Vaysaqi!", "Voy g'irt ikkichisizuuuu!", "Professor!",
"Siz yagonasiz!", "Endi qattan bilaman man kimligizi? Pasportiz bomi, berb turing, besh minutda etberaman!", "Kachoksiz!", 
"Vandaaam!", "Bir tomondan narmalnigayam o'xshab ketasiz", "Ertaga etaman kimligizi", "Lichkaga o'ting etaman, hammani oldida noqulay! ๐", "Voy etvurimi! Qo'ysezchi!","G'irt ablaxakansiz! Qaysidir multfilmda eshituvdim shu gappi, qaysidiyaaa...", "Panda! ๐ผ", "Oooo, N1! .... yomon paxta qo'ydima! ๐", "Xopppa semiz ayiq ๐ป", "Siz shu savolli boshqa bermen manga, qo'qaman etishga!", "Bu anu alyonoshkani og'aynisiyuu!", "Yomonsiiiiiz!", "G'ayrioddiy talant bor sizda!", "Kim bilsin, ko'rinishizdan yotvolib yozvotgan bekorchiga o'xshisiz!", "Arslonsiz, arslon!", "Salkam olim!", "Endi bir gap etaman xafa bo'misiz............ Telefonizi zaryadi kam qopti!๐", "Vooooo! Imidj daxshatu a! Yupkamni berb turimi!๐", "Pumba!", "Biram romantiksizee!", "Ajoyib xayolfarast!","Ponchik!", "Sheryurak!", "Shoptoli qoqi!๐", "Takoooy๐", "Biram shirinso'zsizeeey!", "Ishkalchi o'rdakchaaa!", "Voy qitmireeey!", "Qon qvordizu odammi! E uzr..  Simchalarim tegib zamikani bo'b ketvotti!!!", 
"Manga o'xsharkansiz!", "To'risini eting... Biror joyga boshizi urvoldizmi?! ๐ณ", "Spanjibob!", "Yoqimtooooy!", "O'ziz nima db o'ylisiz?!", "Ha to'nka!๐", "Sizni kelajagiz porloq! Yo'q, bu hazilmas! Ishoning rostan shunaqa!", 
"Shu savolni 10 yillardan keyin o'zizga bering! O'shanda kim bo'lishiz, manmcha muhimroq! Yomonam aqlli bo'b ketvommane!โบ๏ธ ", "Momiq!",
"Ponchik!", "Po'mpaloq!", "Alvastijooon, qay go'rdasan, avlastiyuuu! ๐", "Nima diymiz endi, zo'rsiiiz!", "Mehribonsiz!", "Jumavoyni og'aynisi!",
"Kapitan lagansiz!", "Oq otdagi qora shahzoda!", "Olifta!", "Fantamas!", "Mirpiyoz!", "Orif gilamfurush deganlari sizmi!","Obbo sizeey!"];
//kimman end


$labbay = ["Labbay!", "Mana man!", "Eshitaman!", "Hov!", "Qulog'im sizda!"];


//kimsan
$kimsan = ["Mani ismin Tannozxon" , "Man Tannozxon"];
//kimsan

//omad
$omad = ["1โฃ", "2โฃ", "3โฃ", "4โฃ", "5โฃ", "6โฃ", "Sizga raqam qomadi! ๐"];
//omad

//kim bor start
$kimbor = ["Man borman! Hisobga o'tamanmi asalim ๐", "Man bor, asalim ๐ " ];
//kim bor end

//zerikdim
$zerikdim = ["Bir ko'chaga chiqib aylanib kemismi! Toza havo, bolla, qizla... A!๐", 
"Futbolga chiqmimizmi a! Bir xumordan chiqquncha stadionda maymunde yugurib a!๐", "Badiiy kitob o'qish foydali๐", "Eslab ko'ring, ancha ishlariz bor hali. O'shalani qilib o'tirishi maslahat beraman, vaqtiz bekor ketmidi๐", 
"Kun bo'yi Telegramda o'trish zeriktiradi! Hobbiyingiz bordir axir, o'sha bilan shug'ullaning", "Judayam zerikdizmi? Kanallayam jonga tegdimi? Hatto guruhlayama? Qo'ysezchi!๐", 
"Eng yaqin do'stizi chaqiring yoki yoniga boring. Kelajak rejala haqida gaplashib oling... Foydali mashg'ulot.", "Tur o'rningdan! Mol tashqarida och, buni yotishini qarang, zerikdim deb! ๐", 
"Telefonda g'aroyib rasmla osa bo'ladi. Mahoratizi sinab ko'rmismi?๐", "Kitob o'qing, odam bo'lasiz๐",
"Bitta savol: hozir, ayni paytda oyijoningiz nima bilan mashg'ul? Bilasizmi? Xabar oling...๐", "Diqqat, ashula eshitamiz, zo'ridan! Kimda bor shunaqasidan? Tashela!๐๐ผ", "Do'ppimi berib turimi, kiyib ko'rasiz!๐", "Hammada shu muammomi diyman","Ketdik pleysteyshnga!๐", "Zerikishdan zerikmadizmi, a!๐"];
//zerikdim 

//qisqa suzlarga javob

$ha = ["buncha qisqa yozas, charchadizmi", "hech bulmasa zamonaviy qilib hmm deb quyin ๐","bunaqada zerikib qolas qisqa gapirsangiz ๐๐"];

$hmm = ["tushunarli uyquchi ๐", "sizga ham hmm ๐"];



$tosalom = array_rand($salom, 1);
$tokimman = array_rand($kimman, 1);
$tolabbay = array_rand($labbay, 1);
$tokimbor = array_rand($kimbor, 1);
$toomad = array_rand($omad, 1);
$tokimsan = array_rand($kimsan, 1);
$tozerikdim = array_rand($zerikdim, 1);
$toha = array_rand($ha, 1);
$tohmm = array_rand($hmm, 1);

if ($request->input('messege') === 'salom' || $request->input('messege') === 'Salom' || $request->input('messege') === 'ะกะฐะปะพะผ' || $request->input('messege') === 'ัะฐะปะพะผ') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $salom[$tosalom];
    $chats->save();
}
if ($request->input('messege') === 'kimman' || $request->input('messege') === 'Kimman' || $request->input('messege') === 'Kim man' || $request->input('messege') === 'kim man') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $kimman[$tokimman];
    $chats->save();
}
if ($request->input('messege') === 'Tannoz' || $request->input('messege') === 'Tannozxon' || $request->input('messege') === 'qizaloq' || $request->input('messege') === 'xonim') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $labbay[$tolabbay];
    $chats->save();
}
if ($request->input('messege') === 'kimsan' || $request->input('messege') === 'Kimsan' || $request->input('messege') === 'kim san' || $request->input('messege') === 'Kim san') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $kimsan[$tokimsan];
    $chats->save();
}
if ($request->input('messege') === 'omad' || $request->input('messege') === 'Omad') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $omad[$toomad];
    $chats->save();
}
if ($request->input('messege') === 'kimbor' || $request->input('messege') === 'Kimbor' || $request->input('messege') === 'Kim bor' || $request->input('messege') === 'kim bor') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $kimbor[$tokimbor];
    $chats->save();
}
if ($request->input('messege') === 'zerikdim' || $request->input('messege') === 'Zerikdim') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $zerikdim[$tozerikdim];
    $chats->save();
}
if ($request->input('messege') === 'Ha' || $request->input('messege') === 'ha' || $request->input('messege') === 'xa' || $request->input('messege') === 'Xa') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $ha[$toha];
    $chats->save();
}
if ($request->input('messege') === 'Hmm' || $request->input('messege') === 'Hm' || $request->input('messege') === 'hm' || $request->input('messege') === 'hmm') {
    $chats = new Chat;
    $chats->user_id = 4;
    $chats->to_id = $chat->user_id;
    $chats->messege = $hmm[$tohmm];
    $chats->save();
}



?>