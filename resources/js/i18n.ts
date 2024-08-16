import { createI18n } from 'vue-i18n';

const messages = {
    en: {
        welcome: 'Welcome to our website!',
        MAIN_TITLE: "Online currency converter.",
        MAIN_DESCRIPTION: "Currency converter (Euro, Dollar, BTC), FX exchange rate and calculator.",
        PAGE_TITLE: "{currency} - Current currency exchange converter page",
        PAGE_UPDATED_TIME: "Last update {date}.",
        PAGE_EXCHANGE_RATE: "What is the exchange rate of {amount} {src} in {dest}?",
        CONVERT_QUANTITY: "Quantity",
        CONVERT: "CONVERT",
        PAGE_CHECK_CURRENCY: "Check this currency",
        PAGE_CONTENT: "On this page, you can find conversion of <b>{amount} {src_cuname} ({src_code}) to {dest_cuname} ({dest_code})</b>. Calculator shows the exchange rate of the two currencies conversion. Please find above the latest exchange rate between them, updated at {src_date}. If you want to calculate <b>{src_cuname}</b> or to many currencies, then please go to <a href='{link1}' class='text-blue-500 hover:text-gray-500'>{src_code} calculator</a> or <a href='{link2}' class='text-blue-500 hover:text-gray-500'>{dest_code} calculator</a>. Our money converter is using actual average data from different currency rates sources.",
        ABOUT_SITE: "AZconvert.com is a very useful and convenient currency converter and calculator. You can quickly check the current exchange rates from any country in the world. You just need to put the amount of money you are converting into the box and choose the necessary currencies, e.g. EUR to USD, USD to GBP, EUR to GBP or INR to USD. You can also use our calculator to see what amount of money specified in all the different currencies at one time. Don't forget the charts, to get a quick overview of FX rates in the past 30 days.",
    },
    fr: {
        welcome: 'Bienvenue sur notre site Web!',
    },
};

const i18n = createI18n({
    locale: 'en', // set locale
    fallbackLocale: 'en', // set fallback locale
    messages, // set locale messages
});

export default i18n;
