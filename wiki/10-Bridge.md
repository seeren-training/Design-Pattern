# Bridge

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le pont permet de découpler l'interface d'une classe et son implémentation.
La partie concrète peut alors varier, indépendamment de celle abstraite, tant qu'elle respecte le contrat de réécriture associé qui les lie 

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Bridge.jpg)

Ne pas confondre ce patron avec l'adaptateur, qui est utilisé pour adapter l'interface d'un type vers un autre type, et donc faire en sorte qu'une ou plusieurs classes intègrent un type issu d'une interface en particulier.

___

## 📑 Implémentation

Implémentation

```php
interface DrawingAPI
{
    public function drawCircle($x, $y, $radius);
}

class DrawingCoordinate implements DrawingAPI
{
    public function drawCircle($x, $y, $radius): void
    {
        echo "Circle at $x:$y";
    }
}

class DrawingRadius implements DrawingAPI
{
    public function drawCircle($x, $y, $radius): void
    {
        echo "Circle radius $radius";
    }
}
```

Interface

```php
abstract class Shape
{
    public abstract function draw();
}

class CircleShape extends Shape
{

    private float $x;
    private float $y;
    private float $radius;
    protected DrawingAPI $drawingAPI;

    public function __construct($x, $y, $radius, DrawingAPI $drawingAPI)
    {
        $this->drawingAPI = $drawingAPI;
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw()
    {
        $this
        ->drawingAPI
        ->drawCircle($this->x, $this->y, $this->radius);
    }

}
```

Utilisation

```php
$shapeA = new CircleShape(1, 3, 7, new DrawingCoordinate());
$shapeB = new CircleShape(5, 7, 11, new DrawingRadius());
$shapeA->draw();
$shapeB->draw();
```