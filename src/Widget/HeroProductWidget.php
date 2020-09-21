<?php
namespace AvoRed\HeroProduct\Widget;

use AvoRed\Framework\Database\Contracts\ConfigurationModelInterface;
use AvoRed\Framework\Database\Contracts\OrderModelInterface;
use AvoRed\Framework\Database\Contracts\ProductModelInterface;

class HeroProductWidget
{
    /**
     * Widget View Path
     * @var string $view
     */

    protected $view = "avored-heroproduct::widget.hero-product";

    /**
     * Widget Label
     * @var string $view
     */

    protected $label = 'Hero Product';

    /**
     * Widget Type
     * @var string $view
     */

    protected $type = "cms";

    /**
     * Widget unique identifier
     * @var string $identifier
     */
    protected $identifier = "avored-hero-product";

    public function view()
    {
        return $this->view;
    }

    /*
     * Widget unique identifier
     *
     */
    public function identifier()
    {
        return $this->identifier;
    }

    /*
    * Widget unique identifier
    *
    */
    public function label()
    {
        return $this->label;
    }

    /*
    * Widget unique identifier
    *
    */
    public function type()
    {
        return $this->type;
    }

    /**
     * View Required Parameters
     *
     * @return array
     */
    public function with()
    {
        $config = app(ConfigurationModelInterface::class);
        $productId = $config->getValueByCode('avored_hero_product');

        $repository = app(ProductModelInterface::class);
        $product = null;
        if ($productId > 0) {
            $product = $repository->find($productId);
        }
        return ['heroProduct' => $product];
    }

    public function render()
    {
        return view($this->view(), $this->with());
    }
}
