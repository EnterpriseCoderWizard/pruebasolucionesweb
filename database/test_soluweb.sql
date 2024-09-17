-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 22:11:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_soluweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `catalog_visibility` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `regular_price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `date_on_sale_from` datetime DEFAULT NULL,
  `date_on_sale_from_gmt` datetime DEFAULT NULL,
  `date_on_sale_to` datetime DEFAULT NULL,
  `date_on_sale_to_gmt` datetime DEFAULT NULL,
  `on_sale` tinyint(1) DEFAULT NULL,
  `purchasable` tinyint(1) DEFAULT NULL,
  `total_sales` int(11) DEFAULT NULL,
  `is_virtual` tinyint(1) DEFAULT NULL,
  `downloadable` tinyint(1) DEFAULT NULL,
  `download_limit` int(11) DEFAULT NULL,
  `download_expiry` int(11) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `tax_status` varchar(255) DEFAULT NULL,
  `tax_class` varchar(255) DEFAULT NULL,
  `manage_stock` tinyint(1) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `backorders` varchar(255) DEFAULT NULL,
  `backorders_allowed` tinyint(1) DEFAULT NULL,
  `backordered` tinyint(1) DEFAULT NULL,
  `low_stock_amount` int(11) DEFAULT NULL,
  `sold_individually` tinyint(1) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `dimensions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dimensions`)),
  `shipping_required` tinyint(1) DEFAULT NULL,
  `shipping_taxable` tinyint(1) DEFAULT NULL,
  `shipping_class` varchar(255) DEFAULT NULL,
  `shipping_class_id` int(11) DEFAULT NULL,
  `reviews_allowed` tinyint(1) DEFAULT NULL,
  `average_rating` decimal(3,2) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `upsell_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`upsell_ids`)),
  `cross_sell_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`cross_sell_ids`)),
  `parent_id` varchar(255) DEFAULT NULL,
  `purchase_note` text DEFAULT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`categories`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `name`, `slug`, `permalink`, `date_created`, `date_modified`, `type`, `status`, `featured`, `catalog_visibility`, `description`, `short_description`, `sku`, `price`, `regular_price`, `sale_price`, `date_on_sale_from`, `date_on_sale_from_gmt`, `date_on_sale_to`, `date_on_sale_to_gmt`, `on_sale`, `purchasable`, `total_sales`, `is_virtual`, `downloadable`, `download_limit`, `download_expiry`, `external_url`, `button_text`, `tax_status`, `tax_class`, `manage_stock`, `stock_quantity`, `backorders`, `backorders_allowed`, `backordered`, `low_stock_amount`, `sold_individually`, `weight`, `dimensions`, `shipping_required`, `shipping_taxable`, `shipping_class`, `shipping_class_id`, `reviews_allowed`, `average_rating`, `rating_count`, `upsell_ids`, `cross_sell_ids`, `parent_id`, `purchase_note`, `categories`) VALUES
('32504', 'Umbrella Intelligent', 'umbrella-intelligent', 'https://pequeayuda.com/producto/umbrella-intelligent/', '2024-09-11 13:22:19', '2024-09-11 13:51:32', 'simple', 'publish', 0, 'hidden', '', '', '010-001-5006', 24.73, 26.50, 24.73, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32509', 'Umbrella Muy Resistente al Agua 50+', 'umbrella-muy-resistente-al-agua-50', 'https://pequeayuda.com/producto/umbrella-muy-resistente-al-agua-50/', '2024-09-11 13:22:22', '2024-09-11 13:52:27', 'simple', 'publish', 0, 'hidden', '', '', '010-001-5011', 26.51, 28.40, 26.51, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32510', 'Umbrella Perfect Skin (Tono claro)', 'umbrella-perfect-skin-tono-claro', 'https://pequeayuda.com/producto/umbrella-perfect-skin-tono-claro/', '2024-09-11 13:22:22', '2024-09-11 13:52:41', 'simple', 'publish', 0, 'hidden', '', '', '001-001-5008', 30.75, 32.95, 30.75, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32511', 'Umbrella Sport Ultra', 'umbrella-sport-ultra', 'https://pequeayuda.com/producto/umbrella-sport-ultra/', '2024-09-11 13:22:22', '2024-09-11 13:53:04', 'simple', 'publish', 0, 'hidden', '', '', '010-001-3812', 21.37, 22.90, 21.37, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32512', 'Umbrella Urban', 'umbrella-urban', 'https://pequeayuda.com/producto/umbrella-urban/', '2024-09-11 13:22:22', '2024-09-11 13:53:17', 'simple', 'publish', 0, 'hidden', '', '', '010-001-5010', 27.53, 29.50, 27.53, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32513', 'Vitamin C booster loción', 'vitamin-c-booster-locion', 'https://pequeayuda.com/producto/vitamin-c-booster-locion/', '2024-09-11 13:22:22', '2024-09-11 13:53:29', 'simple', 'publish', 0, 'hidden', '', '', '010-001-5039', 56.54, 60.58, 56.54, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32514', 'Yeux contorno de ojos', 'yeux-contorno-de-ojos', 'https://pequeayuda.com/producto/yeux-contorno-de-ojos/', '2024-09-11 13:22:24', '2024-09-11 13:54:10', 'simple', 'publish', 0, 'hidden', '', '', '010-001-3385', 29.12, 31.20, 29.12, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32515', 'Zudenina gel', 'zudenina-gel', 'https://pequeayuda.com/producto/zudenina-gel/', '2024-09-11 13:22:24', '2024-09-11 13:54:22', 'simple', 'publish', 0, 'hidden', '', '', '010-001-9110', 17.58, 18.84, 17.58, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32516', 'Zudenina PB gel', 'zudenina-pb-gel', 'https://pequeayuda.com/producto/zudenina-pb-gel/', '2024-09-11 13:22:24', '2024-09-11 13:55:07', 'simple', 'publish', 0, 'hidden', '', '', '010-001-5004', 20.53, 22.00, 20.53, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]'),
('32517', 'Zudenina Plus gel', 'zudenina-plus-gel', 'https://pequeayuda.com/producto/zudenina-plus-gel/', '2024-09-11 13:22:24', '2024-09-11 13:55:25', 'simple', 'publish', 0, 'hidden', '', '', '010-001-9123', 22.40, 24.00, 22.40, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, -1, -1, '', '', 'none', '', 0, 0, 'no', 0, 0, NULL, 0, 0.00, '{\"length\":\"\",\"width\":\"\",\"height\":\"\"}', 1, 0, '', 0, 1, 0.00, 0, '[]', '[]', '0', '', '[{\"id\":1093,\"name\":\"Megaderma\",\"slug\":\"megaderma\"}]');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
