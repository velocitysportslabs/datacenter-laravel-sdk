<?php

namespace FocusSportsLabs\FslDataCenter;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Requests\AssociationRequest associations()
 * @method static Requests\ClubRequest clubs()
 * @method static Requests\CountryRequest countries()
 * @method static Requests\CurrencyRequest currencies()
 * @method static Requests\DisciplineRequest disciplines()
 * @method static Requests\DivisionRequest divisions()
 * @method static Requests\FanRequest fans()
 * @method static Requests\OrganizationRequest organizations()
 * @method static Requests\PlayerRequest players()
 * @method static Requests\ProfileRequest profiles()
 * @method static Requests\SpendHistoryRequest spendHistory()
 * @method static Requests\TeamRequest teams()
 *
 * @see Client
 */
class FSLDataCenter extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'fsl-datacenter';
    }
}
