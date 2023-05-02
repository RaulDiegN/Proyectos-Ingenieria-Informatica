package com.example.empleado.entity.services;


import com.example.empleado.entity.dao.IEmpleadoDao;
import com.example.empleado.entity.models.Empleado;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class EmpleadoServiceImpl implements IEmpleadoService{

    private final String version = "Version 2.0";

    @Autowired
    private IEmpleadoDao empleadoDao;

    @Override
    public Optional<Empleado> get(long id_empleado) {
        return empleadoDao.findById(id_empleado);
    }

    @Override
    public List<Empleado> getAll() {
        return (List<Empleado>) empleadoDao.findAll();
    }

    @Override
    public void post(Empleado empleado) {
        empleadoDao.save(empleado);
    }

    @Override
    public void put(Empleado empleado, long id_empleado) {
        empleadoDao.findById(id_empleado).ifPresent((x)->{
            empleado.setId_empleado(id_empleado);
            empleadoDao.save(empleado);
        });
    }

    @Override
    public void delete(long id_empleado) {
        empleadoDao.deleteById(id_empleado);
    }

    @Override
    public String version() {
        return version;
    }
}
