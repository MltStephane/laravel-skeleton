@props([
    'label' => null,
    'icon' => null,
    'data' => null,
    'increaseData' => null,
    'increaseColorCursorGood' => 66,
    'increaseColorCursorBad' => 33,
    'increasePeriodDay' => 30,
])
<x-card>
    <div class="space-y-3">
        <div class="flex gap-2 items-center justify-between">
            <div class="text-xl font-medium">
                {{ $label }}
            </div>
            <div class="bg-blue-200 p-2 rounded-xl">
                <x-icon :name="$icon" class="font-bold text-blue-800 h-5 w-5" />
            </div>
        </div>
        <hr />
        <div class="flex justify-between items-center">
            <div class="text-3xl">
                {{ $data }}
            </div>
            <div class="text-sm">
                <span
                    @class([
                        'text-green-700' => $increaseData > $increaseColorCursorGood,
                        'text-red-700' => $increaseData <=$increaseColorCursorBad,
                        'text-orange-700' => $increaseData > $increaseColorCursorBad && $increaseData <= $increaseColorCursorGood,
                    ])
                >
                    + {{ $increaseData }} %
                </span>
                sur {{ $increasePeriodDay }} jours
            </div>
        </div>
    </div>
</x-card>
