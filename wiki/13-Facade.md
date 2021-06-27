# Facade

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

La façade a pour but de cacher une conception et une interface complexe difficile à comprendre. 

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Facade.png)

La façade permet de simplifier cette complexité en fournissant une interface simple du sous-système. Habituellement, la façade est réalisée en réduisant les fonctionnalités de ce dernier, mais en fournissant toutes les fonctions nécessaires à la plupart des utilisateurs. 

___

## 📑 Implémentation

*Sous système*

```php
class CPU
{
  public function freeze(): void {}
}

class HardDrive
{
  public function execute()): void {}
}

class Memory
{
  public function load(): void {}
}
```

*Facade*

```php
class ComputerFacade
{
	
  private CPU $cpu;

  private Memory $memory;

  private HardDrive $hardDrive;

  protected function __construct()
  {
    (new CPU())->freeze();
    (new Memory())->load();
    (new HardDrive())->execute();
  }

}
```

*Utilisation*

```php
new ComputerFacade();
```
