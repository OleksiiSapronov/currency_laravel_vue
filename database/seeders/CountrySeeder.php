<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'country_code' => 'AF',
                'country_name' => 'Afghanistan',
                'currency_name' => 'Afghani',
                'currency_code' => 'AFN',
                'currency_sign' => '؋',
                'call' => 'Afghans',
                'order' => 0,
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'AL',
                'country_name' => 'Albania',
                'currency_name' => 'Lek',
                'currency_code' => 'ALL',
                'currency_sign' => 'L',
                'call' => 'Albanians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'DZ',
                'country_name' => 'Algeria',
                'currency_name' => 'Algerian Dinar',
                'currency_code' => 'DZD',
                'currency_sign' => 'د.ج',
                'call' => 'Algerians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'AD',
                'country_name' => 'Andorra',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Andorrans',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'AO',
                'country_name' => 'Angola',
                'currency_name' => 'Kwanza',
                'currency_code' => 'AOA',
                'currency_sign' => 'Kz',
                'call' => 'Angolans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'AR',
                'country_name' => 'Argentina',
                'currency_name' => 'Peso',
                'currency_code' => 'ARS',
                'currency_sign' => '$',
                'call' => 'Argentinians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'AM',
                'country_name' => 'Armenia',
                'currency_name' => 'Dram',
                'currency_code' => 'AMD',
                'currency_sign' => 'դր',
                'call' => 'Armenians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'AU',
                'country_name' => 'Australia',
                'currency_name' => 'Dollar',
                'currency_code' => 'AUD',
                'currency_sign' => '$',
                'call' => 'Australians',
                'continent' => 'Oceania',
                'order' => 21
            ],
            [
                'country_code' => 'AT',
                'country_name' => 'Austria',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Austrians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'AZ',
                'country_name' => 'Azerbaijan',
                'currency_name' => 'Manat',
                'currency_code' => 'AZN',
                'currency_sign' => '₼',
                'call' => 'Azerbaijanis',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'BH',
                'country_name' => 'Bahrain',
                'currency_name' => 'Dinar',
                'currency_code' => 'BHD',
                'currency_sign' => 'د.ب',
                'call' => 'Bahrainis',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'BD',
                'country_name' => 'Bangladesh',
                'currency_name' => 'Taka',
                'currency_code' => 'BDT',
                'currency_sign' => '৳',
                'call' => 'Bangladeshis',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'BB',
                'country_name' => 'Barbados',
                'currency_name' => 'Dollar',
                'currency_code' => 'BBD',
                'currency_sign' => '$',
                'call' => 'Barbadians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'BY',
                'country_name' => 'Belarus',
                'currency_name' => 'Belarusian Ruble',
                'currency_code' => 'BYN',
                'currency_sign' => 'Br',
                'call' => 'Belarusians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'BE',
                'country_name' => 'Belgium',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Belgians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'BZ',
                'country_name' => 'Belize',
                'currency_name' => 'Dollar',
                'currency_code' => 'BZD',
                'currency_sign' => '$',
                'call' => 'Belizeans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'BJ',
                'country_name' => 'Benin',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Benians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'BT',
                'country_name' => 'Bhutan',
                'currency_name' => 'Ngultrum',
                'currency_code' => 'BTN',
                'currency_sign' => 'Nu',
                'call' => 'Bhutanes',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'BO',
                'country_name' => 'Bolivia',
                'currency_name' => 'Boliviano',
                'currency_code' => 'BOB',
                'currency_sign' => 'Bs.',
                'call' => 'Bolivians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'BA',
                'country_name' => 'Bosnia and Herzegovina',
                'currency_name' => 'Convertible Mark',
                'currency_code' => 'BAM',
                'currency_sign' => 'KM',
                'call' => 'Bosnians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'BW',
                'country_name' => 'Botswana',
                'currency_name' => 'Pula',
                'currency_code' => 'BWP',
                'currency_sign' => 'P',
                'call' => 'Batswana',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'BR',
                'country_name' => 'Brazil',
                'currency_name' => 'Real',
                'currency_code' => 'BRL',
                'currency_sign' => 'R$',
                'call' => 'Brazilians',
                'continent' => 'America',
                'order' => 15
            ],
            [
                'country_code' => 'BN',
                'country_name' => 'Brunei',
                'currency_name' => 'Dollar',
                'currency_code' => 'BND',
                'currency_sign' => '$',
                'call' => 'Bruneians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'BG',
                'country_name' => 'Bulgaria',
                'currency_name' => 'Lev',
                'currency_code' => 'BGN',
                'currency_sign' => 'лв',
                'call' => 'Bulgarians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'BF',
                'country_name' => 'Burkina Faso',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Burkinabé',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'BI',
                'country_name' => 'Burundi',
                'currency_name' => 'Burundian Franc',
                'currency_code' => 'BIF',
                'currency_sign' => 'Fr',
                'call' => 'Burundians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'KH',
                'country_name' => 'Cambodia',
                'currency_name' => 'Riel',
                'currency_code' => 'KHR',
                'currency_sign' => '៛',
                'call' => 'Cambodians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'CM',
                'country_name' => 'Cameroon',
                'currency_name' => 'Central African CFA Franc',
                'currency_code' => 'XAF',
                'currency_sign' => 'Fr',
                'call' => 'Cameroonians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'CA',
                'country_name' => 'Canada',
                'currency_name' => 'Dollar',
                'currency_code' => 'CAD',
                'currency_sign' => '$',
                'call' => 'Canadians',
                'continent' => 'America',
                'order' => 40
            ],
            [
                'country_code' => 'CV',
                'country_name' => 'Cape Verde',
                'currency_name' => 'Escudo',
                'currency_code' => 'CVE',
                'currency_sign' => '$',
                'call' => 'Cape Verdeans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'CF',
                'country_name' => 'Central African Republic',
                'currency_name' => 'Central African CFA Franc',
                'currency_code' => 'XAF',
                'currency_sign' => 'Fr',
                'call' => 'Central Africans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'TD',
                'country_name' => 'Chad',
                'currency_name' => 'Central African CFA Franc',
                'currency_code' => 'XAF',
                'currency_sign' => 'Fr',
                'call' => 'Chadians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'CL',
                'country_name' => 'Chile',
                'currency_name' => 'Peso',
                'currency_code' => 'CLP',
                'currency_sign' => '$',
                'call' => 'Chilenians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'CN',
                'country_name' => 'China',
                'currency_name' => 'Yuan',
                'currency_code' => 'CNY',
                'currency_sign' => '¥',
                'call' => 'Chinese',
                'order' => 23,
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'CO',
                'country_name' => 'Colombia',
                'currency_name' => 'Peso',
                'currency_code' => 'COP',
                'currency_sign' => '$',
                'call' => 'Colombians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'KM',
                'country_name' => 'Comoros',
                'currency_name' => 'Comorian Franc',
                'currency_code' => 'KMF',
                'currency_sign' => 'Fr',
                'call' => 'Comorians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'CG',
                'country_name' => 'Congo, Republic of the',
                'currency_name' => 'Central African CFA Franc',
                'currency_code' => 'XAF',
                'currency_sign' => 'Fr',
                'call' => 'Congolese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'CD',
                'country_name' => 'Congo, Democratic Republic of the',
                'currency_name' => 'Congolese Franc',
                'currency_code' => 'CDF',
                'currency_sign' => 'Fr',
                'call' => 'Congolese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'CR',
                'country_name' => 'Costa Rica',
                'currency_name' => 'Colón',
                'currency_code' => 'CRC',
                'currency_sign' => '₡',
                'call' => 'Costa Ricans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'HR',
                'country_name' => 'Croatia',
                'currency_name' => 'Kuna',
                'currency_code' => 'HRK',
                'currency_sign' => 'kn',
                'call' => 'Croatians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'CU',
                'country_name' => 'Cuba',
                'currency_name' => 'Peso',
                'currency_code' => 'CUP',
                'currency_sign' => '$',
                'call' => 'Cubans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'CY',
                'country_name' => 'Cyprus',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Cypriots',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'CZ',
                'country_name' => 'Czech Republic',
                'currency_name' => 'Koruna',
                'currency_code' => 'CZK',
                'currency_sign' => 'Kč',
                'call' => 'Czechs',
                'order' => 24,
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'DK',
                'country_name' => 'Denmark',
                'currency_name' => 'Krone',
                'currency_code' => 'DKK',
                'currency_sign' => 'kr',
                'call' => 'Danes',
                'order' => 22,
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'DJ',
                'country_name' => 'Djibouti',
                'currency_name' => 'Franc',
                'currency_code' => 'DJF',
                'currency_sign' => 'Fr',
                'call' => 'Djiboutians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'DM',
                'country_name' => 'Dominica',
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'currency_sign' => '$',
                'call' => 'Dominicans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'DO',
                'country_name' => 'Dominican Republic',
                'currency_name' => 'Peso',
                'currency_code' => 'DOP',
                'currency_sign' => '$',
                'call' => 'Dominicans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'EC',
                'country_name' => 'Ecuador',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Ecuadorians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'EG',
                'country_name' => 'Egypt',
                'currency_name' => 'Pound',
                'currency_code' => 'EGP',
                'currency_sign' => '£',
                'call' => 'Egyptians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'SV',
                'country_name' => 'El Salvador',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Salvadorans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'GQ',
                'country_name' => 'Equatorial Guinea',
                'currency_name' => 'Central African CFA Franc',
                'currency_code' => 'XAF',
                'currency_sign' => 'Fr',
                'call' => 'Equatoguineans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'ER',
                'country_name' => 'Eritrea',
                'currency_name' => 'Nakfa',
                'currency_code' => 'ERN',
                'currency_sign' => 'Nfk',
                'call' => 'Eritreans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'EE',
                'country_name' => 'Estonia',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Estonians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'ET',
                'country_name' => 'Ethiopia',
                'currency_name' => 'Birr',
                'currency_code' => 'ETB',
                'currency_sign' => 'Br',
                'call' => 'Ethiopians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'FJ',
                'country_name' => 'Fiji',
                'currency_name' => 'Dollar',
                'currency_code' => 'FJD',
                'currency_sign' => '$',
                'call' => 'Fijians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'FI',
                'country_name' => 'Finland',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Finns',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'FR',
                'country_name' => 'France',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'French',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'GF',
                'country_name' => 'French Guiana',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'French Guianese',
                'continent' => 'America'
            ],
            [
                'country_code' => 'PF',
                'country_name' => 'French Polynesia',
                'currency_name' => 'Pacific Franc',
                'currency_code' => 'XPF',
                'currency_sign' => 'Fr',
                'call' => 'French Polynesians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'GA',
                'country_name' => 'Gabon',
                'currency_name' => 'Central African CFA Franc',
                'currency_code' => 'XAF',
                'currency_sign' => 'Fr',
                'call' => 'Gabonese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'GM',
                'country_name' => 'Gambia',
                'currency_name' => 'Dalasi',
                'currency_code' => 'GMD',
                'currency_sign' => 'D',
                'call' => 'Gambians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'GE',
                'country_name' => 'Georgia',
                'currency_name' => 'Lari',
                'currency_code' => 'GEL',
                'currency_sign' => '₾',
                'call' => 'Georgians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'DE',
                'country_name' => 'Germany',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Germans',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'GH',
                'country_name' => 'Ghana',
                'currency_name' => 'Cedi',
                'currency_code' => 'GHS',
                'currency_sign' => '₵',
                'call' => 'Ghanaians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'GR',
                'country_name' => 'Greece',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Greeks',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'GD',
                'country_name' => 'Grenada',
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'currency_sign' => '$',
                'call' => 'Grenadians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'GU',
                'country_name' => 'Guam',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Guamanians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'GT',
                'country_name' => 'Guatemala',
                'currency_name' => 'Quetzal',
                'currency_code' => 'GTQ',
                'currency_sign' => 'Q',
                'call' => 'Guatemalans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'GN',
                'country_name' => 'Guinea',
                'currency_name' => 'Franc',
                'currency_code' => 'GNF',
                'currency_sign' => 'Fr',
                'call' => 'Guineans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'GW',
                'country_name' => 'Guinea-Bissau',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Bissau-Guineans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'GY',
                'country_name' => 'Guyana',
                'currency_name' => 'Dollar',
                'currency_code' => 'GYD',
                'currency_sign' => '$',
                'call' => 'Guyanians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'HT',
                'country_name' => 'Haiti',
                'currency_name' => 'Gourde',
                'currency_code' => 'HTG',
                'currency_sign' => 'G',
                'call' => 'Haitians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'HN',
                'country_name' => 'Honduras',
                'currency_name' => 'Lempira',
                'currency_code' => 'HNL',
                'currency_sign' => 'L',
                'call' => 'Hondurans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'HU',
                'country_name' => 'Hungary',
                'currency_name' => 'Forint',
                'currency_code' => 'HUF',
                'currency_sign' => 'Ft',
                'call' => 'Hungarians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'IS',
                'country_name' => 'Iceland',
                'currency_name' => 'Krona',
                'currency_code' => 'ISK',
                'currency_sign' => 'kr',
                'call' => 'Icelanders',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'IN',
                'country_name' => 'India',
                'currency_name' => 'Rupee',
                'currency_code' => 'INR',
                'currency_sign' => '₹',
                'call' => 'Indians',
                'continent' => 'Asia',
                'order' => 39
            ],
            [
                'country_code' => 'ID',
                'country_name' => 'Indonesia',
                'currency_name' => 'Rupiah',
                'currency_code' => 'IDR',
                'currency_sign' => 'Rp',
                'call' => 'Indonesians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'IR',
                'country_name' => 'Iran',
                'currency_name' => 'Rial',
                'currency_code' => 'IRR',
                'currency_sign' => '﷼',
                'call' => 'Iranians',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'IQ',
                'country_name' => 'Iraq',
                'currency_name' => 'Dinar',
                'currency_code' => 'IQD',
                'currency_sign' => 'د.ع',
                'call' => 'Iraqis',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'IE',
                'country_name' => 'Ireland',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Irish',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'IL',
                'country_name' => 'Israel',
                'currency_name' => 'New Shekel',
                'currency_code' => 'ILS',
                'currency_sign' => '₪',
                'call' => 'Israelis',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'IT',
                'country_name' => 'Italy',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Italians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'CI',
                'country_name' => 'Ivory Coast',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Ivorians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'JM',
                'country_name' => 'Jamaica',
                'currency_name' => 'Dollar',
                'currency_code' => 'JMD',
                'currency_sign' => '$',
                'call' => 'Jamaicans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'JP',
                'country_name' => 'Japan',
                'currency_name' => 'Yen',
                'currency_code' => 'JPY',
                'currency_sign' => '¥',
                'call' => 'Japanese',
                'continent' => 'Asia',
                'order' => 19
            ],
            [
                'country_code' => 'JO',
                'country_name' => 'Jordan',
                'currency_name' => 'Dinar',
                'currency_code' => 'JOD',
                'currency_sign' => 'د.أ',
                'call' => 'Jordanians',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'KZ',
                'country_name' => 'Kazakhstan',
                'currency_name' => 'Tenge',
                'currency_code' => 'KZT',
                'currency_sign' => '₸',
                'call' => 'Kazakhs',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'KE',
                'country_name' => 'Kenya',
                'currency_name' => 'Shilling',
                'currency_code' => 'KES',
                'currency_sign' => 'KSh',
                'call' => 'Kenyans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'KI',
                'country_name' => 'Kiribati',
                'currency_name' => 'Dollar',
                'currency_code' => 'AUD',
                'currency_sign' => '$',
                'call' => 'Kiribatians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'KR',
                'country_name' => 'South Korea',
                'currency_name' => 'Won',
                'currency_code' => 'KRW',
                'currency_sign' => '₩',
                'call' => 'Koreans',
                'continent' => 'Asia',
                'order' => 31
            ],
            [
                'country_code' => 'KP',
                'country_name' => 'North Korea',
                'currency_name' => 'Won',
                'currency_code' => 'KPW',
                'currency_sign' => '₩',
                'call' => 'North Koreans',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'KW',
                'country_name' => 'Kuwait',
                'currency_name' => 'Dinar',
                'currency_code' => 'KWD',
                'currency_sign' => 'د.ك',
                'call' => 'Kuwaitis',
                'continent' => 'MiddleEastAsia',
                'order' => 38
            ],
            [
                'country_code' => 'KG',
                'country_name' => 'Kyrgyzstan',
                'currency_name' => 'Som',
                'currency_code' => 'KGS',
                'currency_sign' => 'с',
                'call' => 'Kyrgyzstanians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'LA',
                'country_name' => 'Laos',
                'currency_name' => 'Kip',
                'currency_code' => 'LAK',
                'currency_sign' => '₭',
                'call' => 'Laotians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'LV',
                'country_name' => 'Latvia',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Latvians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'LB',
                'country_name' => 'Lebanon',
                'currency_name' => 'Pound',
                'currency_code' => 'LBP',
                'currency_sign' => 'ل.ل',
                'call' => 'Lebanese',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'LS',
                'country_name' => 'Lesotho',
                'currency_name' => 'Loti',
                'currency_code' => 'LSL',
                'currency_sign' => 'L',
                'call' => 'Basotho',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'LR',
                'country_name' => 'Liberia',
                'currency_name' => 'Dollar',
                'currency_code' => 'LRD',
                'currency_sign' => '$',
                'call' => 'Liberians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'LY',
                'country_name' => 'Libya',
                'currency_name' => 'Dinar',
                'currency_code' => 'LYD',
                'currency_sign' => 'د.ل',
                'call' => 'Libyans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'LI',
                'country_name' => 'Liechtenstein',
                'currency_name' => 'Swiss Franc',
                'currency_code' => 'CHF',
                'currency_sign' => 'CHF',
                'call' => '',
                'continent' => 'Europe',
                'order' => 26
            ],
            [
                'country_code' => 'LT',
                'country_name' => 'Lithuania',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Lithuanians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'LU',
                'country_name' => 'Luxembourg',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Luxembourgers',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'MO',
                'country_name' => 'Macau',
                'currency_name' => 'Pataca',
                'currency_code' => 'MOP',
                'currency_sign' => 'MOP$',
                'call' => 'Macanese',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'MK',
                'country_name' => 'North Macedonia',
                'currency_name' => 'Denar',
                'currency_code' => 'MKD',
                'currency_sign' => 'ден',
                'call' => 'Macedonians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'MG',
                'country_name' => 'Madagascar',
                'currency_name' => 'Ariary',
                'currency_code' => 'MGA',
                'currency_sign' => 'Ar',
                'call' => 'Malagasy',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MW',
                'country_name' => 'Malawi',
                'currency_name' => 'Kwacha',
                'currency_code' => 'MWK',
                'currency_sign' => 'K',
                'call' => 'Malawians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MY',
                'country_name' => 'Malaysia',
                'currency_name' => 'Ringgit',
                'currency_code' => 'MYR',
                'currency_sign' => 'RM',
                'call' => 'Malaysians',
                'continent' => 'Asia',
                'order' => 37
            ],
            [
                'country_code' => 'MV',
                'country_name' => 'Maldives',
                'currency_name' => 'Rufiyaa',
                'currency_code' => 'MVR',
                'currency_sign' => 'Rf',
                'call' => 'Maldivians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'ML',
                'country_name' => 'Mali',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Malians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MT',
                'country_name' => 'Malta',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Maltese',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'MH',
                'country_name' => 'Marshall Islands',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Marshallese',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'MR',
                'country_name' => 'Mauritania',
                'currency_name' => 'Ouguiya',
                'currency_code' => 'MRU',
                'currency_sign' => 'UM',
                'call' => 'Mauritanians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MU',
                'country_name' => 'Mauritius',
                'currency_name' => 'Rupee',
                'currency_code' => 'MUR',
                'currency_sign' => '₨',
                'call' => 'Mauritians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MX',
                'country_name' => 'Mexico',
                'currency_name' => 'Peso',
                'currency_code' => 'MXN',
                'currency_sign' => '$',
                'call' => 'Mexicans',
                'continent' => 'America',
                'order' => 36
            ],
            [
                'country_code' => 'FM',
                'country_name' => 'Micronesia',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Micronesians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'MD',
                'country_name' => 'Moldova',
                'currency_name' => 'Leu',
                'currency_code' => 'MDL',
                'currency_sign' => 'L',
                'call' => 'Moldovans',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'MC',
                'country_name' => 'Monaco',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Monégasques',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'MN',
                'country_name' => 'Mongolia',
                'currency_name' => 'Tugrik',
                'currency_code' => 'MNT',
                'currency_sign' => '₮',
                'call' => 'Mongolians',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'ME',
                'country_name' => 'Montenegro',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Montenegrins',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'MA',
                'country_name' => 'Morocco',
                'currency_name' => 'Dirham',
                'currency_code' => 'MAD',
                'currency_sign' => 'د.م.',
                'call' => 'Moroccans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MZ',
                'country_name' => 'Mozambique',
                'currency_name' => 'Metical',
                'currency_code' => 'MZN',
                'currency_sign' => 'MT',
                'call' => 'Mozambicans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'MM',
                'country_name' => 'Myanmar',
                'currency_name' => 'Kyat',
                'currency_code' => 'MMK',
                'currency_sign' => 'Ks',
                'call' => 'Burmese',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'NA',
                'country_name' => 'Namibia',
                'currency_name' => 'Dollar',
                'currency_code' => 'NAD',
                'currency_sign' => '$',
                'call' => 'Namibians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'NR',
                'country_name' => 'Nauru',
                'currency_name' => 'Dollar',
                'currency_code' => 'AUD',
                'currency_sign' => '$',
                'call' => 'Nauruans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'NP',
                'country_name' => 'Nepal',
                'currency_name' => 'Rupee',
                'currency_code' => 'NPR',
                'currency_sign' => 'Rs',
                'call' => 'Nepalese',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'NL',
                'country_name' => 'Netherlands',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Dutch',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'NC',
                'country_name' => 'New Caledonia',
                'currency_name' => 'Pacific Franc',
                'currency_code' => 'XPF',
                'currency_sign' => 'Fr',
                'call' => 'New Caledonians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'NZ',
                'country_name' => 'New Zealand',
                'currency_name' => 'Dollar',
                'currency_code' => 'NZD',
                'currency_sign' => '$',
                'call' => 'New Zealanders',
                'continent' => 'Oceania',
                'order' => 35
            ],
            [
                'country_code' => 'NI',
                'country_name' => 'Nicaragua',
                'currency_name' => 'Córdoba',
                'currency_code' => 'NIO',
                'currency_sign' => 'C$',
                'call' => 'Nicaraguans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'NE',
                'country_name' => 'Niger',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Nigeriens',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'NG',
                'country_name' => 'Nigeria',
                'currency_name' => 'Naira',
                'currency_code' => 'NGN',
                'currency_sign' => '₦',
                'call' => 'Nigerians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'NU',
                'country_name' => 'Niue',
                'currency_name' => 'Dollar',
                'currency_code' => 'NZD',
                'currency_sign' => '$',
                'call' => 'Niueans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'NF',
                'country_name' => 'Norfolk Island',
                'currency_name' => 'Dollar',
                'currency_code' => 'AUD',
                'currency_sign' => '$',
                'call' => 'Norfolk Islanders',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'MP',
                'country_name' => 'Northern Mariana Islands',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Northern Mariana Islanders',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'NO',
                'country_name' => 'Norway',
                'currency_name' => 'Krone',
                'currency_code' => 'NOK',
                'currency_sign' => 'kr',
                'call' => 'Norwegians',
                'continent' => 'Europe',
                'order' => 34
            ],
            [
                'country_code' => 'OM',
                'country_name' => 'Oman',
                'currency_name' => 'Rial',
                'currency_code' => 'OMR',
                'currency_sign' => 'ر.ع.',
                'call' => 'Omanis',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'PK',
                'country_name' => 'Pakistan',
                'currency_name' => 'Rupee',
                'currency_code' => 'PKR',
                'currency_sign' => '₨',
                'call' => 'Pakistanis',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'PW',
                'country_name' => 'Palau',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Palauans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'PA',
                'country_name' => 'Panama',
                'currency_name' => 'Balboa',
                'currency_code' => 'PAB',
                'currency_sign' => 'B/.',
                'call' => 'Panamanians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'PG',
                'country_name' => 'Papua New Guinea',
                'currency_name' => 'Kina',
                'currency_code' => 'PGK',
                'currency_sign' => 'K',
                'call' => 'Papua New Guineans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'PY',
                'country_name' => 'Paraguay',
                'currency_name' => 'Guarani',
                'currency_code' => 'PYG',
                'currency_sign' => '₲',
                'call' => 'Paraguayans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'PE',
                'country_name' => 'Peru',
                'currency_name' => 'Sol',
                'currency_code' => 'PEN',
                'currency_sign' => 'S/',
                'call' => 'Peruvians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'PH',
                'country_name' => 'Philippines',
                'currency_name' => 'Peso',
                'currency_code' => 'PHP',
                'currency_sign' => '₱',
                'call' => 'Filipinos',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'PN',
                'country_name' => 'Pitcairn Islands',
                'currency_name' => 'New Zealand Dollar',
                'currency_code' => 'NZD',
                'currency_sign' => '$',
                'call' => 'Pitcairn Islanders',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'PL',
                'country_name' => 'Poland',
                'currency_name' => 'Zloty',
                'currency_code' => 'PLN',
                'currency_sign' => 'zł',
                'call' => 'Poles',
                'continent' => 'Europe',
                'order' => 33
            ],
            [
                'country_code' => 'PT',
                'country_name' => 'Portugal',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Portuguese',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'PR',
                'country_name' => 'Puerto Rico',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Puerto Ricans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'QA',
                'country_name' => 'Qatar',
                'currency_name' => 'Rial',
                'currency_code' => 'QAR',
                'currency_sign' => 'ر.ق',
                'call' => 'Qataris',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'RE',
                'country_name' => 'Réunion',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Réunionese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'RO',
                'country_name' => 'Romania',
                'currency_name' => 'Leu',
                'currency_code' => 'RON',
                'currency_sign' => 'lei',
                'call' => 'Romanians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'RU',
                'country_name' => 'Russia',
                'currency_name' => 'Ruble',
                'currency_code' => 'RUB',
                'currency_sign' => '₽',
                'call' => 'Russians',
                'continent' => 'Europe',
                'order' => 18
            ],
            [
                'country_code' => 'RW',
                'country_name' => 'Rwanda',
                'currency_name' => 'Franc',
                'currency_code' => 'RWF',
                'currency_sign' => 'Fr',
                'call' => 'Rwandans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'BL',
                'country_name' => 'Saint Barthélemy',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Saint Barthélemois',
                'continent' => 'America'
            ],
            [
                'country_code' => 'SH',
                'country_name' => 'Saint Helena',
                'currency_name' => 'Pound',
                'currency_code' => 'SHP',
                'currency_sign' => '£',
                'call' => 'Saint Helenians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'KN',
                'country_name' => 'Saint Kitts and Nevis',
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'currency_sign' => '$',
                'call' => 'Kittitians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'LC',
                'country_name' => 'Saint Lucia',
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'currency_sign' => '$',
                'call' => 'Saint Lucians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'MF',
                'country_name' => 'Saint Martin',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Saint Martinois',
                'continent' => 'America'
            ],
            [
                'country_code' => 'PM',
                'country_name' => 'Saint Pierre and Miquelon',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Saint-Pierrais',
                'continent' => 'America'
            ],
            [
                'country_code' => 'VC',
                'country_name' => 'Saint Vincent and the Grenadines',
                'currency_name' => 'East Caribbean Dollar',
                'currency_code' => 'XCD',
                'currency_sign' => '$',
                'call' => 'Vincentians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'WS',
                'country_name' => 'Samoa',
                'currency_name' => 'Tala',
                'currency_code' => 'WST',
                'currency_sign' => 'SAT',
                'call' => 'Samoans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'SM',
                'country_name' => 'San Marino',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Sammarinese',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'ST',
                'country_name' => 'Sao Tome and Principe',
                'currency_name' => 'Dobra',
                'currency_code' => 'STN',
                'currency_sign' => 'Db',
                'call' => 'Sao Tomeans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'SA',
                'country_name' => 'Saudi Arabia',
                'currency_name' => 'Riyal',
                'currency_code' => 'SAR',
                'currency_sign' => 'ر.س',
                'call' => 'Saudis',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'SN',
                'country_name' => 'Senegal',
                'currency_name' => 'Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Senegalese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'RS',
                'country_name' => 'Serbia',
                'currency_name' => 'Dinar',
                'currency_code' => 'RSD',
                'currency_sign' => 'дин',
                'call' => 'Serbians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'SC',
                'country_name' => 'Seychelles',
                'currency_name' => 'Rupee',
                'currency_code' => 'SCR',
                'currency_sign' => '₨',
                'call' => 'Seychellois',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'SL',
                'country_name' => 'Sierra Leone',
                'currency_name' => 'Leone',
                'currency_code' => 'SLL',
                'currency_sign' => 'Le',
                'call' => 'Sierra Leoneans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'SG',
                'country_name' => 'Singapore',
                'currency_name' => 'Dollar',
                'currency_code' => 'SGD',
                'currency_sign' => '$',
                'call' => 'Singaporeans',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'SX',
                'country_name' => 'Sint Maarten',
                'currency_name' => 'Guilder',
                'currency_code' => 'ANG',
                'currency_sign' => 'ƒ',
                'call' => 'Sint Maarteners',
                'continent' => 'America'
            ],
            [
                'country_code' => 'SK',
                'country_name' => 'Slovakia',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Slovaks',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'SI',
                'country_name' => 'Slovenia',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Slovenians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'SB',
                'country_name' => 'Solomon Islands',
                'currency_name' => 'Dollar',
                'currency_code' => 'SBD',
                'currency_sign' => '$',
                'call' => 'Solomon Islanders',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'SO',
                'country_name' => 'Somalia',
                'currency_name' => 'Shilling',
                'currency_code' => 'SOS',
                'currency_sign' => 'Sh',
                'call' => 'Somalis',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'ZA',
                'country_name' => 'South Africa',
                'currency_name' => 'Rand',
                'currency_code' => 'ZAR',
                'currency_sign' => 'R',
                'call' => 'South Africans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'GS',
                'country_name' => 'South Georgia and the South Sandwich Islands',
                'currency_name' => 'Pound',
                'currency_code' => 'GBP',
                'currency_sign' => '£',
                'call' => 'South Georgians',
                'continent' => 'Antarctica'
            ],
            [
                'country_code' => 'ES',
                'country_name' => 'Spain',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Spaniards',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'LK',
                'country_name' => 'Sri Lanka',
                'currency_name' => 'Rupee',
                'currency_code' => 'LKR',
                'currency_sign' => 'Rs',
                'call' => 'Sri Lankans',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'SD',
                'country_name' => 'Sudan',
                'currency_name' => 'Pound',
                'currency_code' => 'SDG',
                'currency_sign' => 'ج.س',
                'call' => 'Sudanese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'SR',
                'country_name' => 'Suriname',
                'currency_name' => 'Dollar',
                'currency_code' => 'SRD',
                'currency_sign' => '$',
                'call' => 'Surinamese',
                'continent' => 'America'
            ],
            [
                'country_code' => 'SJ',
                'country_name' => 'Svalbard and Jan Mayen',
                'currency_name' => 'Krone',
                'currency_code' => 'NOK',
                'currency_sign' => 'kr',
                'call' => 'Svalbardians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'SZ',
                'country_name' => 'Swaziland',
                'currency_name' => 'Lilangeni',
                'currency_code' => 'SZL',
                'currency_sign' => 'E',
                'call' => 'Swazis',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'SE',
                'country_name' => 'Sweden',
                'currency_name' => 'Krona',
                'currency_code' => 'SEK',
                'currency_sign' => 'kr',
                'call' => 'Swedes',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'CH',
                'country_name' => 'Switzerland',
                'currency_name' => 'Swiss Franc',
                'currency_code' => 'CHF',
                'currency_sign' => 'CHF',
                'call' => 'Swiss',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'SY',
                'country_name' => 'Syria',
                'currency_name' => 'Pound',
                'currency_code' => 'SYP',
                'currency_sign' => 'ل.س',
                'call' => 'Syrians',
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'TW',
                'country_name' => 'Taiwan',
                'currency_name' => 'New Taiwan Dollar',
                'currency_code' => 'TWD',
                'currency_sign' => 'NT$',
                'call' => '',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'TJ',
                'country_name' => 'Tajikistan',
                'currency_name' => 'Somoni',
                'currency_code' => 'TJS',
                'currency_sign' => 'SM',
                'call' => 'Tajiks',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'TZ',
                'country_name' => 'Tanzania',
                'currency_name' => 'Shilling',
                'currency_code' => 'TZS',
                'currency_sign' => 'TSh',
                'call' => 'Tanzanians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'TH',
                'country_name' => 'Thailand',
                'currency_name' => 'Baht',
                'currency_code' => 'THB',
                'currency_sign' => '฿',
                'call' => 'Thais',
                'order' => 31,
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'TL',
                'country_name' => 'Timor-Leste',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'Timorese',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'TG',
                'country_name' => 'Togo',
                'currency_name' => 'West African CFA Franc',
                'currency_code' => 'XOF',
                'currency_sign' => 'Fr',
                'call' => 'Togolese',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'TK',
                'country_name' => 'Tokelau',
                'currency_name' => 'Dollar',
                'currency_code' => 'NZD',
                'currency_sign' => '$',
                'call' => 'Tokelauans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'TO',
                'country_name' => 'Tonga',
                'currency_name' => 'Paʻanga',
                'currency_code' => 'TOP',
                'currency_sign' => 'T$',
                'call' => 'Tongans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'TT',
                'country_name' => 'Trinidad and Tobago',
                'currency_name' => 'Dollar',
                'currency_code' => 'TTD',
                'currency_sign' => '$',
                'call' => 'Trinidadians',
                'continent' => 'America'
            ],
            [
                'country_code' => 'TN',
                'country_name' => 'Tunisia',
                'currency_name' => 'Dinar',
                'currency_code' => 'TND',
                'currency_sign' => 'د.ت',
                'call' => 'Tunisians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'TR',
                'country_name' => 'Turkey',
                'currency_name' => 'Lira',
                'currency_code' => 'TRY',
                'currency_sign' => '₺',
                'call' => 'Turks',
                'order' => 31,
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'TM',
                'country_name' => 'Turkmenistan',
                'currency_name' => 'Manat',
                'currency_code' => 'TMT',
                'currency_sign' => 'T',
                'call' => 'Turkmen',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'TV',
                'country_name' => 'Tuvalu',
                'currency_name' => 'Dollar',
                'currency_code' => 'AUD',
                'currency_sign' => '$',
                'call' => 'Tuvaluans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'UG',
                'country_name' => 'Uganda',
                'currency_name' => 'Shilling',
                'currency_code' => 'UGX',
                'currency_sign' => 'USh',
                'call' => 'Ugandans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'UA',
                'country_name' => 'Ukraine',
                'currency_name' => 'Hryvnia',
                'currency_code' => 'UAH',
                'currency_sign' => '₴',
                'call' => 'Ukrainians',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'AE',
                'country_name' => 'United Arab Emirates',
                'currency_name' => 'Dirham',
                'currency_code' => 'AED',
                'currency_sign' => 'د.إ',
                'call' => 'Emiratis',
                'order' => 16,
                'continent' => 'MiddleEastAsia'
            ],
            [
                'country_code' => 'GB',
                'country_name' => 'United Kingdom',
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'currency_sign' => '£',
                'call' => 'British',
                'order' => 27,
                'value' => 1,
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'US',
                'country_name' => 'United States',
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_sign' => '$',
                'call' => 'US',
                'order' => 29,
                'continent' => 'America'
            ],
            [
                'country_code' => 'UY',
                'country_name' => 'Uruguay',
                'currency_name' => 'Peso',
                'currency_code' => 'UYU',
                'currency_sign' => '$',
                'call' => 'Uruguayans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'UZ',
                'country_name' => 'Uzbekistan',
                'currency_name' => 'Som',
                'currency_code' => 'UZS',
                'currency_sign' => 'soʻm',
                'call' => 'Uzbeks',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'VU',
                'country_name' => 'Vanuatu',
                'currency_name' => 'Vatu',
                'currency_code' => 'VUV',
                'currency_sign' => 'Vt',
                'call' => 'Vanuatuans',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'VA',
                'country_name' => 'Vatican City',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => 'Vaticans',
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'VE',
                'country_name' => 'Venezuela',
                'currency_name' => 'Bolívar',
                'currency_code' => 'VES',
                'currency_sign' => 'Bs',
                'call' => 'Venezuelans',
                'continent' => 'America'
            ],
            [
                'country_code' => 'VN',
                'country_name' => 'Vietnam',
                'currency_name' => 'Dong',
                'currency_code' => 'VND',
                'currency_sign' => '₫',
                'call' => 'Vietnames',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'WF',
                'country_name' => 'Wallis and Futuna',
                'currency_name' => 'Pacific Franc',
                'currency_code' => 'XPF',
                'currency_sign' => 'Fr',
                'call' => 'Wallisians',
                'continent' => 'Oceania'
            ],
            [
                'country_code' => 'YE',
                'country_name' => 'Yemen',
                'currency_name' => 'Rial',
                'currency_code' => 'YER',
                'currency_sign' => 'ر.ي',
                'call' => 'Yemenis',
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'ZM',
                'country_name' => 'Zambia',
                'currency_name' => 'Kwacha',
                'currency_code' => 'ZMW',
                'currency_sign' => 'ZK',
                'call' => 'Zambians',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'ZW',
                'country_name' => 'Zimbabwe',
                'currency_name' => 'Dollar',
                'currency_code' => 'ZWL',
                'currency_sign' => '$',
                'call' => 'Zimbabweans',
                'continent' => 'Africa'
            ],
            [
                'country_code' => 'EU',
                'country_name' => 'Euro',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_sign' => '€',
                'call' => '',
                'order' => 28,
                'continent' => 'Europe'
            ],
            [
                'country_code' => 'HK',
                'country_name' => 'Hong Kong',
                'currency_name' => 'Dollar',
                'currency_code' => 'HKD',
                'currency_sign' => '$',
                'call' => 'Hong Kong',
                'order' => 20,
                'continent' => 'Asia'
            ],
            [
                'country_code' => 'WW',
                'country_name' => 'MAIN_WORLDWIDE',
                'currency_name' => 'Bitcoin',
                'currency_code' => 'BTC',
                'currency_sign' => 'Ƀ',
                'call' => '',
                'order' => 16,
                'continent' => 'Worldwide'
            ]
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
        // DB::table('countries')->insert($countries);
    }
}
