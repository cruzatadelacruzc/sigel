-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2019 a las 08:39:13
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bairro`
--

CREATE TABLE `bairro` (
  `id` int(11) NOT NULL,
  `cidade_id` int(11) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bairro`
--

INSERT INTO `bairro` (`id`, `cidade_id`, `descricao`) VALUES
(1, 1, 'Chicharrones'),
(3, 2, 'Rpto Caribe'),
(4, 4, 'Los Olmos'),
(5, 3, 'Mantilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cidade`
--

INSERT INTO `cidade` (`id`, `descricao`) VALUES
(1, 'Porto Alegre'),
(2, 'Guantanamo'),
(3, 'Santa Clara'),
(4, 'Santiago de Cuba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`id`, `descricao`) VALUES
(1, 'Unimed'),
(2, 'Cassi'),
(3, 'Bradesco Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidade`
--

CREATE TABLE `especialidade` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidade`
--

INSERT INTO `especialidade` (`id`, `descricao`) VALUES
(1, 'Otorino'),
(2, 'Odontologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exame`
--

CREATE TABLE `exame` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaterialBiologico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prazo` int(11) NOT NULL,
  `sector_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `exame`
--

INSERT INTO `exame` (`id`, `descricao`, `MaterialBiologico`, `prazo`, `sector_id`) VALUES
(2, 'Biopsia para identificar las fibras', 'Musculos', 5, 1),
(3, 'Lorem input', 'Cabeza', 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exame_preco`
--

CREATE TABLE `exame_preco` (
  `id` int(11) NOT NULL,
  `preco` decimal(2,2) NOT NULL,
  `convenio_id` int(11) DEFAULT NULL,
  `exame_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `especialidade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `nome`, `especialidade_id`) VALUES
(1, 'Cesar', 1),
(2, 'Rafaela', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordem_servicio_exame`
--

CREATE TABLE `ordem_servicio_exame` (
  `id` int(11) NOT NULL,
  `entrega_resultado` datetime NOT NULL,
  `preco` double NOT NULL,
  `exame_id` int(11) DEFAULT NULL,
  `ordem_servico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ordem_servicio_exame`
--

INSERT INTO `ordem_servicio_exame` (`id`, `entrega_resultado`, `preco`, `exame_id`, `ordem_servico_id`) VALUES
(3, '2019-05-29 06:22:23', 45, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordem_servico`
--

CREATE TABLE `ordem_servico` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `convenio_id` int(11) DEFAULT NULL,
  `posto_colecta_id` int(11) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ordem_servico`
--

INSERT INTO `ordem_servico` (`id`, `fecha`, `paciente_id`, `convenio_id`, `posto_colecta_id`, `medico_id`) VALUES
(5, '2016-06-07', 3, 1, 1, 1),
(6, '2019-06-20', 3, 2, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimiento` date NOT NULL,
  `sexo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `data_nascimiento`, `sexo`, `endereco`) VALUES
(1, 'Ariel', '1986-02-01', 'Masculino', 'Sao Paolo # 35'),
(3, 'Jueliet', '1986-08-22', 'Femenino', 'San Lino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posto_colecta`
--

CREATE TABLE `posto_colecta` (
  `id` int(11) NOT NULL,
  `bairro_id` int(11) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posto_colecta`
--

INSERT INTO `posto_colecta` (`id`, `bairro_id`, `descricao`) VALUES
(1, 1, 'Esquina'),
(6, 3, 'Derecha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `descricao`) VALUES
(1, 'Bioquimica'),
(2, 'Hematologia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_81F332059586CC8` (`cidade_id`);

--
-- Indices de la tabla `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9DE5A679DE95C867` (`sector_id`);

--
-- Indices de la tabla `exame_preco`
--
ALTER TABLE `exame_preco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6E1F72A9F9D43F2A` (`convenio_id`),
  ADD UNIQUE KEY `UNIQ_6E1F72A9155C9BEA` (`exame_id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_34E5914C3BA9BFA5` (`especialidade_id`);

--
-- Indices de la tabla `ordem_servicio_exame`
--
ALTER TABLE `ordem_servicio_exame`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D66B76DA155C9BEA` (`exame_id`),
  ADD KEY `IDX_D66B76DA4FB7C65A` (`ordem_servico_id`);

--
-- Indices de la tabla `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_844B57277310DAD4` (`paciente_id`),
  ADD KEY `IDX_844B5727F9D43F2A` (`convenio_id`),
  ADD KEY `IDX_844B57277C0B42A` (`posto_colecta_id`),
  ADD KEY `IDX_844B5727A7FB1C0C` (`medico_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posto_colecta`
--
ALTER TABLE `posto_colecta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_504999BFA94EF08D` (`bairro_id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `exame`
--
ALTER TABLE `exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exame_preco`
--
ALTER TABLE `exame_preco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordem_servicio_exame`
--
ALTER TABLE `ordem_servicio_exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ordem_servico`
--
ALTER TABLE `ordem_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `posto_colecta`
--
ALTER TABLE `posto_colecta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `FK_81F332059586CC8` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`);

--
-- Filtros para la tabla `exame`
--
ALTER TABLE `exame`
  ADD CONSTRAINT `FK_9DE5A679DE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`);

--
-- Filtros para la tabla `exame_preco`
--
ALTER TABLE `exame_preco`
  ADD CONSTRAINT `FK_6E1F72A9155C9BEA` FOREIGN KEY (`exame_id`) REFERENCES `exame` (`id`),
  ADD CONSTRAINT `FK_6E1F72A9F9D43F2A` FOREIGN KEY (`convenio_id`) REFERENCES `convenio` (`id`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `FK_34E5914C3BA9BFA5` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidade` (`id`);

--
-- Filtros para la tabla `ordem_servicio_exame`
--
ALTER TABLE `ordem_servicio_exame`
  ADD CONSTRAINT `FK_D66B76DA155C9BEA` FOREIGN KEY (`exame_id`) REFERENCES `exame` (`id`),
  ADD CONSTRAINT `FK_D66B76DA4FB7C65A` FOREIGN KEY (`ordem_servico_id`) REFERENCES `ordem_servico` (`id`);

--
-- Filtros para la tabla `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `FK_844B57277310DAD4` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `FK_844B57277C0B42A` FOREIGN KEY (`posto_colecta_id`) REFERENCES `posto_colecta` (`id`),
  ADD CONSTRAINT `FK_844B5727A7FB1C0C` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `FK_844B5727F9D43F2A` FOREIGN KEY (`convenio_id`) REFERENCES `convenio` (`id`);

--
-- Filtros para la tabla `posto_colecta`
--
ALTER TABLE `posto_colecta`
  ADD CONSTRAINT `FK_504999BFA94EF08D` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
