# Proxy

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le modèle de conception proxy peut-il résoudre ?

* L'accès à un objet doit être contrôlé.
* Des fonctionnalités supplémentaires doivent être fournies lors de l'accès à un objet.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Proxy.jpg)

Lors de l'accès à des objets sensibles, par exemple, il doit être possible de vérifier que les clients disposent des droits d'accès nécessaires.

___

## 📑 Implémentation

Sujet

```php
class Image
{

    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->loadImageFromDisk();
    }

    private function loadImageFromDisk(): void
    {
        echo "Loading {$this->filename}";
    }

    public function displayImage(): void
    {
    	echo "Displaying {$this->filename}";
    }

}
```

Proxy

```php
class ProxyImage implements Image
{

    private ?Image $image = null;

    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function displayImage(): void
    {
        if (!$this->image) {
           $this->image = new Image($this->filename);
        }
        $this->image->displayImage();
    }

}
```

Utilisation

```php
$image1 = new ProxyImage("Photo1");
$image1->displayImage(); // Loading necessary
$image1->displayImage(); // Loading unnecessary
$image1->displayImage(); // Loading unnecessary
```