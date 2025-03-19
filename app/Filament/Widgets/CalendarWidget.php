<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\EventResource;
use App\Filament\Resources\WorkshopResource;
use App\Models\Event;
use App\Models\Workshop;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {
        // You can use $fetchInfo to filter events by date.
        // This method should return an array of event-like objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#returning-events
        // You can also return an array of EventData objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#the-eventdata-class

        return [
            // Current events query
            'events' => Event::query()
                ->where('date', '>=', $fetchInfo['start'])
                ->get()
                ->map(
                    fn(Event $event) => EventData::make()
                        ->id($event->id)
                        ->title($event->name)
                        ->start($event->date)
                        ->url(
                            url: EventResource::getUrl(name: 'edit', parameters: ['record' => $event]),
                            shouldOpenUrlInNewTab: true
                        )
                )
                ->toArray(),

            // Add your other model query here
            'workshops' => Workshop::query()
                ->where('date', '>=', $fetchInfo['start'])
                ->get()
                ->map(
                    fn(Workshop $workshop) => EventData::make()
                        ->id($workshop->id)
                        ->title($workshop->name)
                        ->start($workshop->date)
                        ->url(
                            url: WorkshopResource::getUrl(name: 'edit', parameters: ['record' => $workshop]),
                            shouldOpenUrlInNewTab: true
                        )
                )
                ->toArray(),
        ];
    }
}
