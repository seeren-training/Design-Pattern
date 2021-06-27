# Flyweight

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le modèle de poids mouche est utile lorsque vous traitez un grand nombre d'objets avec des éléments répétés simples qui utiliseraient une grande quantité de mémoire s'ils étaient stockés individuellement. Il est courant de conserver les données partagées dans des structures de données externes et de les transmettre temporairement aux objets lorsqu'ils sont utilisés.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Flyweight.png)

Les objets poids mouche peuvent:

* Stocker un état intrinsèque invariant, indépendant du contexte et partageable.
* Fournir une interface pour passer à l'état extrinsèque qui est variable, dépendant du contexte et ne peut pas être partagé

___

## 📑 Implémentation

*Invariant*

```php
class Coffee
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
```

*Variant*

```php
class Order
{

    private static array $coffees = [];

    public static function takeOrder(string $name, int $tableNumber): array
    {
        if (!array_key_exists($name, Order::$coffees)) {
            self::$coffees[$name] = new Coffee($name);
        }
        return [
            "table" => $tableNumber,
            "coffee" => self::$coffees[$name]
        ];
    }

}
```

*Client*

```php
class CoffeeShop
{

    private array $orders = [];

    public function takeOrder(string $flavour, int $tableNumber)
    {
        $this->orders[] = Order::takeOrder($flavour, $tableNumber);
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

}
```

*Utilisation*

```php
$coffeeShop = new CoffeeShop();

$coffeeShop->takeOrder("Caramel", 5);
$coffeeShop->takeOrder("Vanilla", 8);
$coffeeShop->takeOrder("Caramel", 4);
$orders = $coffeeShop->getOrders();

array_walk(
  $orders,
  fn($order) =>  var_dump($order["table"], $order["coffee"])
);
```