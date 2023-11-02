<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-between">
                        <h5>Users Activities</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Activity Group</th>
                                <th>Old Data</th>
                                <th>New Data</th>
                                <th>Activity Performed By</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td>{{ date('d F Y H:i', strtotime($activity->created_at)) }}</td>
                                    <td>{{ $activity->event }}</td>
                                    <td>
                                        <ul>
                                            @foreach($activity->old_values as $oKey => $oldValue)
                                                <li>{{ $oKey.': '. $oldValue }}</li>
                                            @endforeach

                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach($activity->new_values as $nKey => $newValue)
                                                <li>{{ $nKey.': '. $newValue }}</li>
                                            @endforeach

                                        </ul>
                                    </td>

                                    <td>{{ $activity->user?->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
