<?php

namespace VelocitySportsLabs\DataCenter;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Requests\AssociationRequest associations()
 * @method static Requests\AthleteRequest athletes()
 * @method static Requests\ClubRequest clubs()
 * @method static Requests\CountryRequest countries()
 * @method static Requests\CurrencyRequest currencies()
 * @method static Requests\DisciplineRequest disciplines()
 * @method static Requests\DivisionRequest divisions()
 * @method static Requests\FanRequest fans()
 * @method static Requests\OrganizationRequest organizations()
 * @method static Requests\OrganizationRequestRequest organizationRequests()
 * @method static Requests\ProfileRequest profiles()
 * @method static Requests\SpendHistoryRequest spendHistory()
 * @method static Requests\TeamRequest teams()
 *
 * @see Client
 */
class DataCenter extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'vsl-datacenter';
    }
}
