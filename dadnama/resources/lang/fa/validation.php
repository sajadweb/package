<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */



	"code"				=>":attribute مور تاید نمی باشد",
	"captcha"          =>"  کد امنیتی اشتباه است . لطفا دوباره وارد کنید",
	"accepted"         => ":attribute باید پذیرفته شده باشد.",
	"active_url"       => "آدرس :attribute معتبر نیست",
	"after"            => ":attribute باید تاریخی بعد از :date باشد.",
	"alpha"            => ":attribute باید شامل حروف الفبا باشد.",
	"alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
	"alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
	"array"            => ":attribute باید شامل آرایه باشد.",
	"before"           => ":attribute باید تاریخی قبل از :date باشد.",
	"between"          => [
		"numeric" => ":attribute باید بین :min و :max باشد.",
		"file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
		"string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
		"array"   => ":attribute باید بین :min و :max آیتم باشد.",
	],
	"boolean"          => "The :attribute field must be true or false",
	"confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
	"date"             => ":attribute یک تاریخ معتبر نیست.",
	"date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
	"different"        => ":attribute و :other باید متفاوت باشند.",
	"digits"           => ":attribute باید :digits رقم باشد.",
	"digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
	"email"            => "فرمت :attribute معتبر نیست.",
	"exists"           => ":attribute انتخاب شده، معتبر نیست.",
	"image"            => ":attribute باید تصویر باشد.",
	"in"               => ":attribute انتخاب شده، معتبر نیست.",
	"integer"          => ":attribute باید نوع داده ای عددی (integer) باشد.",
	"ip"               => ":attribute باید IP آدرس معتبر باشد.",
	"max"              => [
		"numeric" => ":attribute نباید بزرگتر از :max باشد.",
		"file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
		"string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
		"array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
	],
	"mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
	"min"              => [
		"numeric" => ":attribute نباید کوچکتر از :min باشد.",
		"file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
		"string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
		"array"   => ":attribute نباید کمتر از :min آیتم باشد.",
	],
	"not_in"           => ":attribute انتخاب شده، معتبر نیست.",
	"numeric"          => ":attribute باید شامل عدد باشد.",
	"regex"            => ":attribute یک فرمت معتبر نیست",
	"required"         => "فیلد :attribute الزامی است",
	"required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
	"required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
	"required_with_all"=> ":attribute الزامی است زمانی که :values موجود است.",
	"required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
	"required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
	"same"             => ":attribute و :other باید مانند هم باشند.",
	"size"             => [
		"numeric" => ":attribute باید برابر با :size باشد.",
		"file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
		"string"  => ":attribute باید برابر با :size کاراکتر باشد.",
		"array"   => ":attribute باسد شامل :size آیتم باشد.",
	],
	"timezone"         => "The :attribute must be a valid zone.",
	"unique"           => ":attribute قبلا انتخاب شده است.",
	"url"              => "فرمت آدرس :attribute اشتباه است.",
	"alpha_spaces"             => "لطفا در :attribute از الفبای فارسی استفاده  کنید",
	"sendcode"             => "مدت زمان ارسال :attribute  حدود 5 دقیقه می باشد یا  :attribute ارسالی  اشتباه می باشد",
	"this_mobile_unique"             => "این  :attribute قبلا برای شما ثبت شده",
	"smdate"             => "این  :attribute  معتبر نمی باشد",
	"idcredit"             => "انتخاب  :attribute  الزامی می باشد",
	'strength' => 'The password :attribute is too weak and must contain one or more uppercase, lowercase, numeric, and special character (!@#$%^&*).',

	/*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

	'custom' => [
		"dir"=>"rtl",
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
	""=>"",
    */
	'attributes' => [

		'discount'=>' کد تخفیف',
		'lat1'=>'عرض جغرافیای'.' مبدا',
		'lng1'=>'طول جغرافیای'.' مبدا',
		'lat2'=>'عرض جغرافیای'.' مقصد',
		'lng2'=>'طول جغرافیای'.' مقصد',

		'category'=>'دسته کسب کار',

		'postalcode'=>[
		'part1'=>'پارت یک کد پستی',
		'part2'=>'پارت دو کد پستی',
		'part3'=>'پارت سه کد پستی',
		'part4'=>'پارت چهار کد پستی',
		],
		//sm add 4.24.2016
		'lat'=>'عرض جغرافیای',
		'lng'=>'طول جغرافیای',
		'idcredit'=>'کارمند',
		'pin'=>'رمز کارت',
		'expire_date'=>'تاریخ انقضای کارت',
		'firs_name'=>'نام ',
		//end


		//sm add 4.23.2016
		'bank_number'=>'شماره حساب',
		'cardname'=>'نام کارت',
		//end
		"repname"=>"نام نماینده شرکت",
		"ecocode"=>'کد اقتصادی شرکت',
		"compmellicode"=>"شناسه ملی شرکت",
		'regyear'=>"سال ثبت ",
		'regnum'=>"شماره ثبت",
		'companyname'=>"نام شرکت",
		"transferstatus"=>"انقال وجه",
		'firstname' => 'نام',
		'surname' => 'نام خانوادگی',
		'fathername' => 'نام پدر',
		'mellicode' => 'کد ملی ',
		'shenasnamenum' => 'شماره شناسنامه',
		'birthplace' => 'محل تولد',
		'shenasnameplace' => 'محل صدور شناسنامه',

		'statename' => 'استان ',
		'cityname' => 'شهر ',

		//'postalcode' => 'کد پستی',
		'bankname' => 'نام بانک',

		'branchname' => 'نام شعبه',

		'cardcode' => 'شماره کارت',

		'accountnum' => 'شماره حساب',


		"code"=>'کد ارسالی',
		"captcha"=>'متن امنیتی',
		'gateip'=>'ای پی ',
		"gatekind"=>"نوع فروشگاه",
		"gatename"=>"نام فروشگاه",
		"url"=>"   آدرس سایت",
		"terminalcode"=>"ترمینال کد",
		"lname"=>"نام خانوادگی",
		"fname"=>"نام",
		"photo"=>"تصویر",
		"name" => "نام",
		"username" => "نام کاربری",
		"email" => "پست الکترونیکی",
		"first_name" => "نام",
		"last_name" => "نام خانوادگی",
		"password" => "رمز عبور",
		"password_confirmation" => "تاییدیه ی رمز عبور",
		"city" => "شهر",
		"state" => "استان",
		"country" => "کشور",
		"address" => "نشانی",
		"phone" => "تلفن",
		"mobile" => "تلفن همراه",
		"age" => "سن",
		"sex" => "جنسیت",
		"gender" => "جنسیت",
		"day" => "روز",
		"month" => "ماه",
		"year" => "سال",
		"hour" => "ساعت",
		"minute" => "دقیقه",
		"second" => "ثانیه",
		"title" => "عنوان",
		"text" => "متن",
		"content" => "محتوا",
		"description" => "توضیحات",
		"excerpt" => "گلچین کردن",
		"date" => "تاریخ",
		"time" => "زمان",
		"available" => "موجود",
		"size" => "اندازه",
		'submit'=>[
			'new'=>"ایجاد کردن",
			'edit'=>"ویرایش کن",
			'send'=>"ارسال",

		],

		"price" => "قیمت",
		"numexist"=>"تعداد موجودی",
		"licencenum"=>"شماره پروانه کسب",
		"gateurl"=>" فروشگاه",
		"passwordurl"=>"رمز وب سرویس",
		"enemadcode"=>"کد نماد الکترونیک",
		"phonenum"=>"شماره تماس",
		"latitude"=>"طول جغرافیایی",
		"longitude"=>"عرض جغرافیایی",
		"subject"=>"موضوع",
		"off"=>"تخفیف",
		"lastname"=>"نام خانوادگی",
		"personnelcode"=>"کد پرسنلی",
		"baseamount"=>"میزان اعتبار",
		"amount"=>"مبلغ",
		"started_at"=>"تاریخ شروع",
		"ended_at"=>"تاریخ پایان",
		"chequenum"=>"شماره چک",
		"contractnum"=>"شماره قرارداد",
		"plaquenum"=>'شماره پلاک'
	],
];
