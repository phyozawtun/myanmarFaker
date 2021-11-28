## myanmarFaker

Faker ဆိုတာက  Fake ဒေတာတွေ လုပ်ပေးတဲ့ PHP library ခပ်သေးသေးတစ်ခုပါ။ Database ထဲ ဒေတာ အကြမ်းတွေ၊ အစမ်းထည့်တာတို့ Data seeding  လုပ်တာတို့၊ XML ဖိုင်ကိုကြည့် ကောင်းအောင် Fake ဒေတာတွေနဲ့ လုပ်ကြံတာတို့၊ Rest API တွေကို Fake string တွေနဲ့ response ပြန်တဲ့အခါမျိုးမှာ အတော်အသုံးဝင်ပါတယ်။ Laravel မှာလည်း default ပါတာမို့ native PHP သမားတွေရော Laravel အတွက်ရော friendly ဖြစ်တဲ့ Package ဆိုလည်း ဟုတ်ပါတယ်။

### Basic Usage

အရင်ဆုံး `myanmarFaker\Factory::create()` ဆိုပြီး initialize လုပ်ဖို့လိုပါတယ်။ ပြီးနောက်ဖော်ပြပါအတိုင်း မြန်မာ စာကြမ်းတွေကို လိုချင်တဲ့ပုံစံအတိုင်း request လုပ်ပြီး တောင်းလို့ရပါတယ်။

```php
<?php
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = myanmarFaker\Factory::create();
// generate data by calling methods
echo $faker->name();
// 'Vince Sporer'
echo $faker->email();
// 'walter.sophia@hotmail.com'
echo $faker->text();
// 'Numquam ut mollitia at consequuntur inventore dolorem.'
```

### Project Road Map

အခု myanmarFaker ရဲ့ဆက်ပြီးတော့ရေးသွားမယ့် Features တွေကို [Project road map](https://github.com/phyozawtun/myanmarFaker/projects/1) မှာဖော်ပြထားပါတယ်။

### Project Wiki
project ရဲ့ ရည်ရွယ်ချက်နဲ့ Mission Vision တွေကို Wiki Page မှာဖတ်လို့ရပါတယ်။

### Jekyll Themes

Your Pages site will use the layout and styles from the Jekyll theme you have selected in your [repository settings](https://github.com/phyozawtun/myanmarFaker/settings/pages). The name of this theme is saved in the Jekyll `_config.yml` configuration file.
