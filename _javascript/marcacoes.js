var timetable = new Timetable();
timetable.setScope(9, 19); // opcional, definir intervalo de horas 
timetable.addLocations(['Dr. Susana', 'Dr. Diogo', 'Dr. Carlos A']);
timetable.addEvent('Consulta médica', 'Dr. Susana', new Date(2015,7,17,10,45), new Date(2015,7,17,12,30));
timetable.addEvent('Pediatria', 'Dr. Diogo', new Date(2019,7,17,09,45), new Date(2019,7,17,10,30));
var renderer = new Timetable.Renderer(timetable);
renderer.draw('.timetable'); // any css selector

console.log(timetable.events)