import { InertiaLinkProps } from '@inertiajs/react';
import { LucideIcon } from 'lucide-react';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavGroup {
    title: string;
    items: NavItem[];
}

export interface NavItem {
    title: string;
    href: NonNullable<InertiaLinkProps['href']>;
    icon?: LucideIcon | null;
    isActive?: boolean;
}

export interface SharedData {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
    [key: string]: unknown;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    two_factor_enabled?: boolean;
    created_at?: string;
    updated_at: string;
    [key: string]: unknown; // This allows for additional properties...
}

export interface User {
    id: number;
    user_id: number;
    first_name:string;
    last_name:string;
    email?:string;
    phone?:string;
    adress?:string;
    city?:string;
    postal_code?:string;
    country?:string;
    notes?:string;
    created_at:string;
    updated_at:string;
}

export interface PropsModels{
    showModal: boolean;
    modalType: "create"|"edit";
    contact?: Contact;
    onClose: ()=>void;
}

export interface PropsList{
    contacts:Contact[];
    onEdit:(contact: Contact)=>void;
}
export interface PropsSinglePage{
    contact:Contact[];
    onEdit:(contact: Contact)=>void;
}