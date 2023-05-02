package com.example.empleado.entity.services;

import com.example.empleado.entity.models.Empleado;

import java.util.List;
import java.util.Optional;

public interface IEmpleadoService {

    public Optional<Empleado> get(long id_empleado);
    public List<Empleado> getAll();
    public void post(Empleado empleado);
    public void put(Empleado empleado, long id_empleado);
    public  void delete(long id_empleado);
    public String version();
}
