
import { Country } from "@/types";

export const SERVER_URL = "https://phpstack-1255990-4653753.cloudwaysapps.com";

/**
 * 
 * @param src Country
 * @output chinese-yuan-renminbi-cny-page
 */
export const genCurrencyLink = (src: Country): string => {
  let out = "";
  if (src.call != "" && src.call != " ") out += src.call + "-";
  out += src.currency_name.replace(' ', '-') + '-' + src.currency_code + '-page.html';
  return "/currencies/pairs/" + out.replace(' ', '-').toLowerCase();
}

/**
 * @param src Country
 * @param dest Country
 * @param value Amount of currency
 * @output 1-romanian-leu-ron-to-bangladeshi-taka-bdt
 */
export const genConvertLink = (src: Country, dest: Country, value: number | string = 1): string => {
  let out = `${value}-`;
  if (src.call != "" && src.call != " ") {
    out += src.call + "-";
  }
  out += src.currency_name.replace(' ', '-') + '-' + src.currency_code + '-to-';
  if (dest.call !== "") {
    out += dest.call + "-";
  }
  out += dest.currency_name.replace(' ', '-') + '-' + dest.currency_code;
  return "/currencies/pairs/" + out.replace(' ', '-').toLowerCase() + ".html";
}

/**
 * @param country Country
 * @output indonesian-rupiah-idr-calculator
 */
export const genCalculatorLink = (country: Country, amount: number = 0): string => {
  let out = "";
  if(amount > 0) out += amount + '-';
  if (country.call != "" && country.call != " ") out += country.call + "-";
  out += country.currency_name.replace(' ', '-');
  out += '-' + country.currency_code;
  out += '-calculator';
  return "/currencies/pairs/" + out.replace(' ', '-').toLowerCase() + ".html";
}

export const genFlagUrl = (code: string): string => {
  if(code == "WW") return `data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAABEtJREFUaEPtml9sU1Ucx7/f29W2FyaCbsO2GzNqNEaQREj0ReOLcVHjXzTT+GBMNNG2w2l8IGoWMRiy6aR3YGZ8ID4YIwbjvydjAhr1BQlgwgM+gNgWjAgi2t5t7f3KHQ6W0fberZvrkp63m/M7v/P9/M7vnP7uuSUWeOMC14+aAfLpaLcB3DQRCIf43EzmvnOfR6z4Ssl5/EKQeDicyg7PZtBqBihY8Q8AdU+IIrg+nMxscZ/z6djDJHZcEKxvIsnc7Q2ASRForEAjhWrcEHOWQqcGOy8LB8fug7B9Xjdx3op+DbCzYqCEVhKL/QRSkk3qAGH8ImEfhB/Cp7Lfsg9FP+PL2XiuQN6KHiJ47Uwn8BwnnICBd0dH+eaS3sxJT/spBvMPMCFIyklYZ/bkvp8ORP0AABBxJuCUbgmljh/0C+EJYA/FnnbApRRIqaVE3mVAN1SZ4KgDHHL7CRkGuExCO4jL/YnSl5Fk7h5/tu4c02xKXxPK095bBWJjJJl9darbwtvRDhrG/aI2AGirNK0EIaAV5nO5X/1ImzaA69ROxwZFrK8wQVmACdvx4zUw+hXINVUg1pmp7MdzB2DF+wW9OBOA8SJvKHYrhYqb9exeeMFMZN+qWwB9hEDht5hNoKmcyPoH6G9bVAg1nSHL70GJD5mpzM66XYGCFX0K4Htlow+NFMnYpYnsH3UHIIG2FX9M1DCBReXTR2kzkevxI/7cUT2DZlfZxAQH7ICxyXUbLCnSZBSXSMbVcrgWKD0AGiurTLk7PMYu9mYKfmXNOoDfiS+yIzaFg8v7+MyPY9PxUT8A0mlQnxoIDISSmZ/8QtQPwH+KBRQJvBZJZjf6gZhTAAklEgE/Qsqk1IZIIvuG19i5ALiolPhzW8fSYLHYaRhchZLuFPEgyXA1cYJGWHSujzx//Eg1u/8FYKqAwtCVKyDjHQBdVSMsvBJJZV+vOwBXkIZvDhZGju0huaqyQO/Sel5WYEKwbUWfFbi1EoCkA2Yqd/7aspzd/AKko/eK/KwiALTfTOZW12UKuaLsdDwlavwetVyTnF1m6tgddQmgrS2LC05wb7UbD9G7LppRCuWHolsopipEpuobmTvmH6t9jSFnG4i1VY9SqttM5D6saQXcChLWsmamTv6lzVc0583IdQZKn5wth+NeAOpD0+nWjuawU2qBjKscajWlLgm3VXoXOO9TOBFuDrbzySN2TQCFweWdaAoc9vpFnO1+Ab1mMjvo5dczhex07G4RX3g5ms1+AjtCieyjJOTl1xMgb0VfIrjZy9Fs9J+rndQfbsu9zEdQ8uPTE6CQjr0P4gk/zmZs496PEjvpcCDck/l5On68AazYdhI3lj+nEZLQOfl2WkLegEZce4e8ZPKro4S/Sewn+LtD56jh8KBjcF+kNbPHb8Sn6vAE8IpG4wuNV4Q8+hsr0Eih+U6hBf9XgxoDWPPwmjdxzQpqdPAv+8xpTzIa5+4AAAAASUVORK5CYII=`;
  return `https://flagcdn.com/32x24/${code.toLowerCase()}.png`;
};

export const genCurrencyFullName = (country: Country): string => {
  return `${country.call} ${country.currency_name} ${country.currency_code}`;
}

export const disSingleValue = (value: number): string => {
  return `${new Intl.NumberFormat().format(value)}`;
}

export const disValue = (src: Country, dest: Country, amount: number = 1, show: boolean = false, precision = 2): string => {
  let rate = Math.pow(10, Math.floor(Math.log10(src.latest_currency['balance'])));
  if(Math.floor(Math.log10(rate / amount)) >= 4) precision = 8;
  else if(Math.floor(Math.log10(rate / amount)) >= 3) precision = 6;
  else if(Math.floor(Math.log10(rate / amount)) >= 2) precision = 4;
  else if(Math.floor(Math.log10(rate / amount)) >= 1) precision = 2;
  // Format as currency
  const formatter = new Intl.NumberFormat('en', {
    style: 'decimal',
    currency: dest.currency_code,
    minimumFractionDigits: 0,
    maximumFractionDigits: precision
  });

  // console.log(formatter.format(1234567.89));

  let divider = rate * 1000;
  if(dest.country_code == "WW") divider = 1e7;
  let value = Math.round(amount * dest.latest_currency.balance * divider / src.latest_currency.balance) / divider;
  if(src.country_code == "WW") {
    value = Math.round(value);
    return `${formatter.format(value)}`;
  }
  if(dest.country_code == "WW") return `${value}`;
  if(!show) return `${formatter.format(value)}`;
  if(dest.currency_sign == '$') return `$${formatter.format(value)}`;
  return `${formatter.format(value)}${dest.currency_sign}`;
}