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

    'accepted' => ':attribute باید پذیرفته شده باشد.',
    'active_url' => 'آدرس :attribute معتبر نیست',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha' => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash' => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num' => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array' => ':attribute باید آرایه باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between' => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array' => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean' => 'فیلد :attribute فقط می‌تواند صفر و یا یک باشد',
    'confirmed' => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_format' => ':attribute با الگوی :format مطاقبت ندارد.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions' => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct' => 'فیلد :attribute تکراری است.',
    'email' => ':attribute باید یک ایمیل معتبر باشد',
    'exists' => ':attribute انتخاب شده، معتبر نیست.',
    'file' => ':attribute باید یک فایل باشد',
    'filled' => 'فیلد :attribute الزامی است',
    'image' => ':attribute باید تصویر باشد.',
    'in' => ':attribute انتخاب شده، معتبر نیست.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => ':attribute باید عدد صحیح باشد.',
    'ip' => ':attribute باید IP معتبر باشد.',
    'ipv4' => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6' => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json' => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'max' => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array' => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes' => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes' => ':attribute باید یکی از فرمت های :values باشد.',
    'min' => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file' => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string' => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array' => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in' => ':attribute انتخاب شده، معتبر نیست.',
    'numeric' => ':attribute باید عدد باشد.',
    'present' => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex' => 'فرمت :attribute معتبر نیست',
    'required' => 'فیلد :attribute الزامی است',
    'required_if' => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless' => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with' => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all' => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without' => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same' => ':attribute و :other باید مانند هم باشند.',
    'size' => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file' => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string' => ':attribute باید برابر با :size کاراکتر باشد.',
        'array' => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'string' => 'فیلد :attribute باید متن باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique' => ':attribute قبلا انتخاب شده است.',
    'uploaded' => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url' => 'فرمت آدرس :attribute اشتباه است.',

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
    */

    'attributes' => [
        'name' => 'نام',
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'رمز عبور',
        'password_confirmation' => 'تکرار رمز عبور',
        'city' => 'شهر',
        'country' => 'کشور',
        'address' => 'آدرس پستی',
        'phone' => 'شماره ثابت',
        'cellphone' => 'شماره همراه',
        'age' => 'سن',
        'sex' => 'جنسیت',
        'gender' => 'جنسیت',
        'day' => 'روز',
        'month' => 'ماه',
        'year' => 'سال',
        'hour' => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',
        'title' => 'عنوان',
        'text' => 'متن',
        'content' => 'محتوا',
        'description' => 'توضیحات',
        'excerpt' => 'گزیده مطلب',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'available' => 'موجود',
        'size' => 'اندازه',
        'terms' => 'شرایط',
        'price' => 'قیمت',
        'code' => 'کد',
        'score' => 'تعداد امتیاز',
        'display_name' => 'نام نمایشی',
        'resource' => 'نام ریسورس',
        'old_password' => 'رمز عبور فعلی',
        'newpassword' => 'رمز عبور جدید',
        'newpassword_confirmation' => 'تکرار رمز عبور جدید',
        'longitude' => 'طول جغرافیایی',
        'latitude' => 'عرض جغرافیایی',
        'brand_id' => 'برند',
        'tag_ids' => 'تگ ها',
        'tel' => 'تلفن',
        'instagram' => 'اینستاگرام',
        'telegram' => 'تلگرام',
        'about us' => 'درباره ما',
        'Logo' => 'لوگو',
        'slider' => 'اسلایدر',
        'articleImage' => 'عکس',
        'title2 ' => 'عنوان بخش خدمات',
        'description2  ' => 'توضیحات بخش خدمات ',
        'bannerImageService' => 'عکس بنر ',
        'indexImageService' => 'عکس صفحه خدمات ما ',
        'product_file' => ' فایل ارسالی ',
        'metaTitle' => 'عنوان متا',
        'metaDescription' => 'توضیحات متا',
        'nickName' => 'نامک',
        'introduction_file' => 'ویدوئو',
        'productPoster' => 'پوستر',
        'image' => 'عکس',
        'video ' => 'فایل',
        'mobile ' => 'موبایل',
        'otp' => 'کد تایید',
        'lastName' => 'نام خانوادگی',
        'province' => 'استان',
        'cities' => 'شهر',
        'mobile' => 'موبایل',
        'color' => 'رنگ',
        'national_code' => 'کدملی',
        'education_level' => 'تحصیلات',
        'father_name' => 'نام پدر',
        'birth_city' => 'محل تولد',
        'social_mobile' => 'شماره شبکه اجتماعی',
        'title_one' => 'عنوان اول',
        'btn_txt_one' => 'متن دکمه اول',
        'btn_link_one' => 'لینک دکمه اول',
        'description_one' => 'توضیحات اول',
        'title_two' => 'عنوان دوم',
        'btn_txt_two' => 'متن دکمه دوم',
        'btn_link_two' => 'لینک دکمه دوم',
        'description_two' => 'توضیحات دکمه دوم',
        'cat_name' => 'عنوان دسته بندی',
        'category' => 'دسته بندی',
        'intro_video_cover' => 'کاور فیلم معرفی',
        'intro_video' => 'فیلم معرفی',
        'meta_description' => 'کلمات کلیدی',
        'meta_keywords' => 'توضیحات متا',
        'amazing_price' => 'قیمت تخفیف خورده',
        'duration' => 'مدت دوره',
        'translated' => 'ترجمه',
        'open_at' => 'ساعت کاری',
        'btn_text' => 'متن دکمه',
        'race_img' => 'تصویر نژاد',
        'race_id' => 'نژاد',
        'departure_time' => 'تاریخ شروع (حرکت)',
        'return_time' => 'تاریخ بازگشت',
        'tour_name' => 'نام تور',
        'post_title' => 'عنوان مقاله',
        'post_nickname' => 'نامک مقاله',
        'post_content' => 'محتوای مقاله',
        'categories' => 'دسته بندی ها',
        'post_meta_keywords' => 'کلمات کلیدی متا',
        'post_meta_description' => 'توضیحات متا',
        'post_image' => 'تصوری مقاله',
        'character' => 'دسته شخصیتی',
        'question' => 'سوال',
        'test_image' => 'تصویر آزمون',
        'main_test' => 'نوع آزمون',
        'album_title' => 'عنوان آلبوم',
        'cat_title' => 'عنوان دسته آلبوم',
    ],

];
