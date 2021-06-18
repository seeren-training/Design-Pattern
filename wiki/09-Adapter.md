# Adapter

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le modèle de conception de l'adaptateur résout des problèmes tels que:

* Comment peut-on réutiliser une classe qui n'a pas d'interface dont un client a besoin ?
* Comment les classes qui ont des interfaces incompatibles peuvent-elles fonctionner ensemble ?
* Comment fournir une interface alternative à une classe ?
* Souvent, une classe (déjà existante) ne peut pas être réutilisée uniquement parce que son interface n'est pas conforme à l'interface requise par les clients.

![image](./resources/adapter.png)

___

## 📑 Implémentation

*Adaptee*

```php
class Iphone implements Phone
{
    private bool connector;

    public function useLightning(): void
    {
        connector = true;
    }

}

class Android implements Phone
{
    private bool connector;

    public function useMicroUsb(): void
    {
        connector = true;
    }

}
```

*Adapter*

```php
class PhoneAdapter
{

    public function recharge(Phone $phone): void
    {
        if (Phone instanceof Iphone) {
            $phone->useLightning();
            return;
        }
        $phone->useMicroUsb();
    }

}
```

*Utilisation*

```php
$adapter = new PhoneAdapter();
$adapter->recharge(new Iphone());
$adapter->recharge(new Android());
```