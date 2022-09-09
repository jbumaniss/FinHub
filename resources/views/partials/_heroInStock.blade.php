<div class="bg-finHub grid grid-flow-col auto-cols-max p-6 flex items-center justify-between divide-x w-full">
    @foreach($stocks as $stock)
        <div class="text-center" style="width: 100px">
            <div class="pl-4 text-white font-bold">{{$stock->getName()}}
                <span class="pl-4 text-white"><strong>{{number_format($stock->getPrice(),2,'.',',')}}</strong></span>
                @if($stock->getOldPrice() < $stock->getPrice())
                    <div class="mt-1 text-green-400">
                            <span class="icon float-left mt-1">
                                <i class="fas fa-chevron-up"></i>
                            </span>
                        <span style="font-size: 1.2rem;">{{round((($stock->getOldPrice()*100)/$stock->getPrice())) /100}}%</span>
                    </div>
                @else
                    <div class="mt-1 text-red-400">
                            <span class="icon float-left mt-1">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        <span style="font-size: 1.2rem;">{{round((($stock->getOldPrice()*100)/$stock->getPrice())) /100}}%</span>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
