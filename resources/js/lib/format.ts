const numberFormatter = new Intl.NumberFormat('ar-EG', {
    maximumFractionDigits: 2,
});

export function formatNumber(value: number | string): string {
    return numberFormatter.format(Number(value));
}

export function formatPrice(value: number | string): string {
    return `${formatNumber(value)} ج.م`;
}
