import { createI18n } from 'vue-i18n';

const messages = {
    en: {
        MAIN_TITLE: "Online currency converter.",
        MAIN_DESCRIPTION: "Currency converter (Euro, Dollar, BTC), FX exchange rate and calculator.",
        PAGE_TITLE: "{currency} - Current currency exchange converter page",
        UPDATED_TIME: "Last update {date}.",
        LAST_UPDATE: "Last update",
        PAGE_EXCHANGE_RATE: "What is the exchange rate of {amount} {src} in {dest}?",
        CONVERT_QUANTITY: "Quantity",
        CONVERT: "Convert",
        CHECK_CURRENCY: "Check this currency",
        PAGE_CONTENT: "On this page, you can find conversion of <b>{amount} {src_cuname} ({src_code}) to {dest_cuname} ({dest_code})</b>. Calculator shows the exchange rate of the two currencies conversion. Please find above the latest exchange rate between them, updated at {src_date}. If you want to calculate <b>{src_cuname}</b> or to many currencies, then please go to <a href='{link1}' class='text-blue-500 hover:text-gray-500'>{src_code} calculator</a> or <a href='{link2}' class='text-blue-500 hover:text-gray-500'>{dest_code} calculator</a>. Our money converter is using actual average data from different currency rates sources.",
        ABOUT_SITE: "AZconvert.com is a very useful and convenient currency converter and calculator. You can quickly check the current exchange rates from any country in the world. You just need to put the amount of money you are converting into the box and choose the necessary currencies, e.g. EUR to USD, USD to GBP, EUR to GBP or INR to USD. You can also use our calculator to see what amount of money specified in all the different currencies at one time. Don't forget the charts, to get a quick overview of FX rates in the past 30 days.",
        PAGE_CONVERT_MAJOR_CURRENCIES: "Conversion table for major world currencies",
        TAB_MAIN_CURRENCIES: "Main currencies",
        TAB_AMERICA: "North, Central and South America",
        TAB_EUROPE: "Europe",
        TAB_MIDDLE_EAST_ASIA: "Middle East",
        TAB_AFRICA: "Africa",
        TAB_ASIA: "Asia",
        TAB_OCEANIA: "Oceania & Pacific",
        TAB_TITLE: "Currency exchange rates table of the {src} ({code}), updated at {date}",
        TAB_SUBTITLE: "On this page you will find list of the mutual conversions of the <b>{name} ({name}) currency and other major world currencies.</b>",
        CURRENCY: "Currency",
        CURRENT_FX_RATE: "Current FX rate",
        FX_CALCULATOR: "FX calculator",
        CURRENCY_CALCULATOR: "{code} calculator",
        TABLE_CONVERT_CURRENCY: "Convert {src} to {dest}",
        LINK_TEXT: "{name} ({code}) is an official currency in the following countries: {countries}",
        LINK_LABEL: "Link to this page. If you would like to link to {name} ({code}) exchange rates page, simply copy and paste the HTML from below into your page:",
        MAIN_COUNTRIES: "Main curriencies",
        OTHER_COUNTRIES: "Other curriencies",
        CONVERT_TITLE: "How much is {amount} {src_name} ({src_cuname}) in {src_name} {dest_name} {src_cuname}?",
        CONVERT_TEXT: "You have just converted <b>{amount} {src_code} to {dest_code} - {src_curname} to {dest_curname}</b>. To convert it, we have used value of <b> {amount} {src_code} = {value} {dest_code} </b>. You can convert <b>{src_name}</b>  to any other currency using the above form. Invert exchange - How much is 1 EUR to USD ? Go to USD dollar converter and calculator.",
        CONVERT_TABLE_NAME: "Currency converter. Check the current exchange rate of {src_code} to {dest_code}",
        CONVERT_HISTORY: "Currency exchange history from Thu {from} to {to}",
        CONVERT_OTHER_CURRENCIES: "{amount} {code} in other currencies",
        TO: "to",
        GOTO_CALCULATOR: "Go to currency calculator",
        CALCULATOR_TITLE: "{name} ({code}) Currency Exchange Rate calculator",
        CALCULATOR_TABLE_TITLE: "Currency Exchange Rate calculator {name} - {code} to all worldwide currencies.",
        CALCULATOR_TABLE_DESCRIPTION: "On the calculator page, you can find conversion of <b>{amount} {name}</b> to all worldwide currencies. Please find latest calculation rates between them, updated at {date}. If you want to calculate {name} to other currencies, go to converter page {name} , or currency page {name}."
    },
    fr: {
        welcome: 'Bienvenue sur notre site Web!',
    },
};

const i18n = createI18n({
    legacy: false, 
    locale: 'en', // set locale
    fallbackLocale: 'en', // set fallback locale
    messages, // set locale messages
});

export default i18n;
