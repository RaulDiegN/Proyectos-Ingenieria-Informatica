package com.example.empleado.controller;


import com.example.empleado.entity.models.Empleado;
import com.example.empleado.entity.services.IEmpleadoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
public class EmpleadoController {

    @Autowired
    IEmpleadoService empleadoService;

    @GetMapping("/version")
    public String version(){
        return empleadoService.version();
    }

    @GetMapping("/empleados/{id_empleado}")
    public Optional<Empleado> getOne(@PathVariable(value = "id_empleado") long id_empleado){
        return empleadoService.get(id_empleado);
    }

    @GetMapping("/empleados")
    public List<Empleado> getAllEmpleados(){
        return empleadoService.getAll();
    }

    @PostMapping("/empleado")
    public void add(@RequestBody Empleado empleado){
        empleadoService.post(empleado);
    }

    @PutMapping("/empleados/{id_empleado}")
    public void update(@RequestBody Empleado empleado, @PathVariable(value = "id_empleado") long id_empleado){
        empleadoService.put(empleado, id_empleado);
    }

    @DeleteMapping("/empleados/{id_empleado}")
    public void delete(@PathVariable(value = "id_empleado") long id_empleado){
        empleadoService.delete(id_empleado);
    }
}
