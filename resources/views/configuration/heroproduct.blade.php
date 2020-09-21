@php
    $value = $repository->getValueByCode('avored_hero_product');

    $productRepository = app(\AvoRed\Framework\Database\Contracts\ProductModelInterface::class);
    $productOptions = $productRepository->all()->pluck('name', 'id');

@endphp
<avored-select
    field-name="avored_hero_product"
    label-text="{{ __('avored-heroproduct::system.config-title') }}"
    :options="{{ json_encode($productOptions) }}"
    init-value="{{ $value }}"
></avored-select>
