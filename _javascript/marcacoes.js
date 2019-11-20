document.addEventListener('DOMContentLoaded', () => {
  const aprovadas = new Timetable();
  aprovadas.setScope(9, 19); // opcional, definir intervalo de horas 
  aprovadas.addLocations(['Dr. Susana', 'Dr. Diogo', 'Dr. Carlos A']);
  aprovadas.addEvent('Consulta médica', 'Dr. Susana', new Date(2015,7,17,10,45), new Date(2015,7,17,12,30));
  aprovadas.addEvent('Pediatria', 'Dr. Diogo', new Date(2019,7,17,9,45), new Date(2019,7,17,10,30));
  const renderer = new Timetable.Renderer(aprovadas);
  renderer.draw('#aprovadas'); // any css selector

  console.log(aprovadas.events)
});