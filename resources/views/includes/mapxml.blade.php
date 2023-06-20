<?xml version="1.0" encoding="UTF-8"?>
<markers>
  @foreach($maps as $map)
  <marker id="{{$map->id}}" name="{{$map->name}}" address="{{$map->address}}" 
    lat="{{$map->lat}}" lng="{{$map->lng}}" type="{{$map->type}}" />
  @endforeach
</markers> 
