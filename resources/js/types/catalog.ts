export interface Category {
    id: number;
    name: string;
    slug: string;
    image: string | null;
}

export interface ProductCategory {
    id: number;
    name: string;
    slug: string;
}

export interface Product {
    id: number;
    name: string;
    slug: string;
    price: string;
    unit: string | null;
    image: string | null;
    category: ProductCategory;
}
