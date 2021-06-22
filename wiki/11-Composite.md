# Composite

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le patron composite propose une structure récursive permettant d'implémenter avec la même interface logicielle sur les feuilles et les composites afin qu'ils soient manipulés de la même manière1. 

![image](./resources/Composite.png)

___

## 📑 Implémentation

*Composite*

```php
class Component
{

    private string $name;
    private string? $path;	
    private Directory? $parent;

    public function __construct(string $name, Directory $parent = null)
    {
        $this->name = $name;
        $this->parent = $parent;
        if($this->parent){
            $this->parent->addChild($this);
            $this->path = $this->parent->path . "/" . $this->parent->name();
        }
    }

    public function setParent(Directory $parent): void
    {
        $this->parent = $parent;
    }
}
```

*Directory*

```php
class Directory extends Component
{

  private array $childs = [];

  public function addChild(Component $child): void
  {
    $child->setParent($this);
    $this->childs[] = $child;
  }

}
```

*File*

```php
class File extends Component
{ }
```

*Utilisation*

```php
$root = new Directory('root');
$dir = new Directory('dir', $root);
$file = new File('file.txt', $dir);
$doc = new CFile('doc.pdf', $dir);
```
