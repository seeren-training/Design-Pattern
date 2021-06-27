# State

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Le modèle d'état est défini pour résoudre deux problèmes principaux:

* Un objet doit changer de comportement lorsque son état interne change.
* Le comportement spécifique à l'état doit être défini indépendamment. C'est-à-dire que l'ajout de nouveaux états ne devrait pas affecter le comportement des états existants.

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/State.png)

L'implémentation d'un comportement spécifique à un état directement dans une classe est inflexible car elle engage la classe dans un comportement particulier et rend impossible l'ajout d'un nouvel état ou la modification ultérieure du comportement d'un état existant indépendamment (sans modifier) ​​la classe. En cela, le modèle décrit deux solutions :

* Définissez des objets (états) distincts qui encapsulent un comportement spécifique à chaque état. C'est-à-dire, définir une interface (état) pour effectuer un comportement spécifique à l'état et définir des classes qui implémentent l'interface pour chaque état.
* Une classe délègue un comportement spécifique à l'état à son objet d'état actuel au lieu d'implémenter directement un comportement spécifique à l'état.

___

## 📑 Implémentation

*State*

```php
interface State
{
    public function writeName(StateContext $context, string $name);
}

class LowerCaseState implements State
{
    public function writeName(StateContext $context, string $name)
    {
        var_dump(strtolower($name));
        $context->setState(new MultipleUpperCaseState());
    }
}

class MultipleUpperCaseState implements State
{
    private int $count = 0;

    public function writeName(StateContext $context, string $name)
    {
        var_dump(strtoupper($name));
        if (++$this->count > 1) {
            $context->setState(new LowerCaseState());
        }
    }

}
```

*Context*

```php
class StateContext
{

    private State $state;

    public function __constructor()
    {
        $this->state = new LowerCaseState();
    }

    public function setState(State $newState)
    {
        $this->state = $newState;
    }

    public function writeName(string $name)
    {
        $this->state->writeName($this, $name);
    }

}
```

*Utilisation*

```php
$context = new StateContext();
$context->writeName("Monday");
$context->writeName("Tuesday");
$context->writeName("Wednesday");
$context->writeName("Thursday");
$context->writeName("Friday");
$context->writeName("Saturday");
$context->writeName("Sunday");
```
