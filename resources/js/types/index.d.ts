import { Config } from 'ziggy-js';

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};

export interface Currency {
    id: number;
    date: Date;
    balance: number;
    currency_code: string;
}

export interface Country {
    id: number;
    country_name: string;
    country_code: string;
    currency_sign: string;
    currency_code: string;
    currency_name: String;
    continent: String;
    call: string;
    date: Date;
    value: number;
    order: number;
    top_currency: number;
    top_order: number;
    display: string;
    display_order: number;
    latest_currency: Currency;
}