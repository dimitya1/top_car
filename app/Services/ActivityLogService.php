<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivityLogService
{
    public const TYPE_WEBSITE = 'website';
    public const TYPE_API = 'api';
    public const TYPE_ADMIN_PANEL = 'admin_panel';

    public static array $types = [
        self::TYPE_WEBSITE,
        self::TYPE_API,
        self::TYPE_ADMIN_PANEL,
    ];

    public const ACTION_CREATED = 'created';
    public const ACTION_UPDATED = 'updated';
    public const ACTION_DELETED = 'deleted';

    public static array $actions = [
        self::ACTION_CREATED,
        self::ACTION_UPDATED,
        self::ACTION_DELETED,
    ];

    public function getAllForAdminTable(): array
    {
        $data = DB::table(config('activitylog.table_name', 'activity_log'))
            ->select()
            ->latest()
            ->get()
            ->toArray();

        $table = [];
        foreach ($data as $record) {
            $row['type']       = $record->log_name;
            $row['action']     = $record->event;
            $row['causer']     = $record->causer_type;
            $row['properties'] = json_decode($record->properties, true);
            $row['subject']    = $record->subject_type;
            $row['date']       = Carbon::parse($record->created_at);
            $row['backgroundColor'] = match ($row['action']) {
                self::ACTION_CREATED => 'green',
                self::ACTION_UPDATED => 'yellow',
                self::ACTION_DELETED => 'red',
                default              => 'gray',
            };
            $row['badgeColor'] = match ($row['type']) {
                self::TYPE_WEBSITE     => 'green',
                self::TYPE_API         => 'indigo',
                self::TYPE_ADMIN_PANEL => 'red',
                default                => 'gray',
            };

            $table[] = $row;
        };

        return $table;
    }
}
