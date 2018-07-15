const { Fragment } = wp.element;
const { registerBlockType } = wp.blocks;
const {
	MediaPlaceholder,
	BlockControls,
	RichText
} = wp.editor;
const {
	Button,
	Toolbar,
	TextControl
} = wp.components;

registerBlockType( 't3n-gutenberg-block/post', {
	title: 'Author box',
	icon: 'admin-post',
	category: 'widgets',
	attributes: {
		name: {
			type: 'string',
			source: 'text',
			selector: '.author-name',
		},
		imgSrc: {
			type: 'string',
			source: 'attribute',
			attribute: 'src',
			selector: 'img',
		},
		imgId: {
			type: 'number',
		},
		imgAlt: {
			type: 'string',
			source: 'attribute',
			attribute: 'alt',
			selector: 'img',
		},
		description: {
			type: 'array',
			source: 'children',
			selector: '.author-description',
		},
	},
	edit: props => {
		const { attributes: { name, imgSrc, imgId, imgAlt, description, editing }, className, setAttributes, isSelected } = props;
		const onSelectImg = ( img ) => {
			if ( ! img || ! img.url ) {
				setAttributes( { imgSrc: undefined, imgId: undefined } );
				return;
			}
			setAttributes( { imgSrc: img.url, imgId: img.id, imgAlt: img.alt } );
		}
		const isEditing = () => {
			setAttributes( { imgId: undefined } );
		}
		return (
			<div className={ className }>
				<div className='author-avatar'>
					{ ! imgId ? (
						<MediaPlaceholder
							icon="format-image"
							labels={ {
								title: 'Autorenbild',
								name: 'Autorenbild',
							} }
							onSelect={ onSelectImg }
							accept="image/*"
							type="image"
						/>
					) : (
						<Fragment>
							<img src={ imgSrc } alt={ imgAlt } />
							{ isSelected ? (
								<Button
									className="remove-image"
									label={ 'Bild löschen' }
									onClick={ isEditing }
									icon="no-alt"
								/>
							) : '' }
						</Fragment>
					) }
				</div>
				<div className='author-meta'>
					<TextControl
						label='Name'
						value={ name }
						onChange={ ( name ) => setAttributes( { name } ) }
					/>
					<RichText
						placeholder='Autorenbeschreibung'
						tagName='div'
						multiline='p'
						value={ description }
						onChange={ ( description ) => setAttributes( { description } ) }
					/>
				</div>
			</div>
		);
	},
	save: props => {
		const { className, imgSrc, imgAlt, description, name } = props.attributes;
		return (
			<div className={ className }>
				<div className='author-avatar'>
					<img src={ imgSrc } alt={ imgAlt } />
				</div>
				<div className='author-meta'>
					<p className='author-name'>{ name }</p>
					<div className='author-description'>
						{ description }
					</div>
				</div>
			</div>
		);
	},
});